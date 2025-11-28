<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    public function index()
    {
        $credentials = Credential::where('user_id', auth()->id())
            ->latest()
            ->paginate(15);

        return view('credentials.index', compact('credentials'));
    }

    public function create()
    {
        return view('credentials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'value' => 'required|string',
            'description' => 'nullable|string',
            'service' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Credential::create($validated);

        return redirect()->route('credentials.index')
            ->with('success', 'Credential created successfully!');
    }

    public function show(Credential $credential)
    {
        $this->authorize('view', $credential);

        return view('credentials.show', compact('credential'));
    }

    public function edit(Credential $credential)
    {
        $this->authorize('update', $credential);

        return view('credentials.edit', compact('credential'));
    }

    public function update(Request $request, Credential $credential)
    {
        $this->authorize('update', $credential);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'value' => 'required|string',
            'description' => 'nullable|string',
            'service' => 'nullable|string|max:255',
        ]);

        $credential->update($validated);

        return redirect()->route('credentials.index')
            ->with('success', 'Credential updated successfully!');
    }

    public function destroy(Credential $credential)
    {
        $this->authorize('delete', $credential);

        $credential->delete();

        return redirect()->route('credentials.index')
            ->with('success', 'Credential deleted successfully!');
    }

    public function copyValue(Credential $credential)
    {
        $this->authorize('view', $credential);

        return response()->json([
            'value' => $credential->value
        ]);
    }
}
