<?php

namespace App\Http\Controllers;

use App\Models\DatabaseCredential;
use App\Models\Project;
use Illuminate\Http\Request;

class DatabaseCredentialController extends Controller
{
    public function index()
    {
        $databaseCredentials = DatabaseCredential::where('user_id', auth()->id())
            ->with('project')
            ->latest()
            ->paginate(15);

        return view('database-credentials.index', compact('databaseCredentials'));
    }

    public function create()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('database-credentials.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'database_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'connection_string' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        DatabaseCredential::create($validated);

        return redirect()->route('database-credentials.index')
            ->with('success', 'Database credential created successfully!');
    }

    public function show(DatabaseCredential $databaseCredential)
    {
        $this->authorize('view', $databaseCredential);

        $databaseCredential->load('project');

        return view('database-credentials.show', compact('databaseCredential'));
    }

    public function edit(DatabaseCredential $databaseCredential)
    {
        $this->authorize('update', $databaseCredential);

        $projects = Project::where('user_id', auth()->id())->get();

        return view('database-credentials.edit', compact('databaseCredential', 'projects'));
    }

    public function update(Request $request, DatabaseCredential $databaseCredential)
    {
        $this->authorize('update', $databaseCredential);

        $validated = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'host' => 'required|string|max:255',
            'port' => 'required|integer',
            'database_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'connection_string' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $databaseCredential->update($validated);

        return redirect()->route('database-credentials.index')
            ->with('success', 'Database credential updated successfully!');
    }

    public function destroy(DatabaseCredential $databaseCredential)
    {
        $this->authorize('delete', $databaseCredential);

        $databaseCredential->delete();

        return redirect()->route('database-credentials.index')
            ->with('success', 'Database credential deleted successfully!');
    }

    public function testConnection(DatabaseCredential $databaseCredential)
    {
        $this->authorize('view', $databaseCredential);

        // Placeholder for database connection testing

        return response()->json([
            'success' => true,
            'message' => 'Connection test feature coming soon!'
        ]);
    }
}
