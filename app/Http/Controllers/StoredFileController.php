<?php

namespace App\Http\Controllers;

use App\Models\StoredFile;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoredFileController extends Controller
{
    public function index()
    {
        $files = StoredFile::where('user_id', auth()->id())
            ->with('project')
            ->latest()
            ->paginate(20);

        return view('files.index', compact('files'));
    }

    public function create()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('files.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:51200', // 50MB max
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('files', $fileName, 'public');

        StoredFile::create([
            'user_id' => auth()->id(),
            'project_id' => $validated['project_id'] ?? null,
            'name' => $validated['name'],
            'original_name' => $originalName,
            'file_path' => $filePath,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
        ]);

        return redirect()->route('files.index')
            ->with('success', 'File uploaded successfully!');
    }

    public function edit(StoredFile $file)
    {
        $this->authorize('update', $file);

        $projects = Project::where('user_id', auth()->id())->get();

        return view('files.edit', compact('file', 'projects'));
    }

    public function update(Request $request, StoredFile $file)
    {
        $this->authorize('update', $file);

        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
        ]);

        $file->update($validated);

        return redirect()->route('files.index')
            ->with('success', 'File updated successfully!');
    }

    public function destroy(StoredFile $file)
    {
        $this->authorize('delete', $file);

        $file->delete();

        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully!');
    }

    public function download(StoredFile $file)
    {
        $this->authorize('view', $file);

        return Storage::disk('public')->download($file->file_path, $file->original_name);
    }
}
