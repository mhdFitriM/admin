<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::where('user_id', auth()->id())
            ->with('projects')
            ->latest()
            ->paginate(12);

        return view('servers.index', compact('servers'));
    }

    public function create()
    {
        return view('servers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'nullable|ip',
            'provider' => 'nullable|string|max:255',
            'port' => 'nullable|integer',
            'ssh_username' => 'nullable|string',
            'ssh_password' => 'nullable|string',
            'ssh_key' => 'nullable|string',
            'cpanel_url' => 'nullable|url',
            'cpanel_username' => 'nullable|string',
            'cpanel_password' => 'nullable|string',
            'root_password' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive,maintenance',
        ]);

        $validated['user_id'] = auth()->id();

        Server::create($validated);

        return redirect()->route('servers.index')
            ->with('success', 'Server created successfully!');
    }

    public function show(Server $server)
    {
        $this->authorize('view', $server);

        $server->load('projects');

        return view('servers.show', compact('server'));
    }

    public function edit(Server $server)
    {
        $this->authorize('update', $server);

        return view('servers.edit', compact('server'));
    }

    public function update(Request $request, Server $server)
    {
        $this->authorize('update', $server);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ip_address' => 'nullable|ip',
            'provider' => 'nullable|string|max:255',
            'port' => 'nullable|integer',
            'ssh_username' => 'nullable|string',
            'ssh_password' => 'nullable|string',
            'ssh_key' => 'nullable|string',
            'cpanel_url' => 'nullable|url',
            'cpanel_username' => 'nullable|string',
            'cpanel_password' => 'nullable|string',
            'root_password' => 'nullable|string',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive,maintenance',
        ]);

        $server->update($validated);

        return redirect()->route('servers.index')
            ->with('success', 'Server updated successfully!');
    }

    public function destroy(Server $server)
    {
        $this->authorize('delete', $server);

        $server->delete();

        return redirect()->route('servers.index')
            ->with('success', 'Server deleted successfully!');
    }

    public function testConnection(Server $server)
    {
        $this->authorize('view', $server);

        // This is a placeholder for SSH connection testing
        // You can implement actual SSH connection testing here

        return response()->json([
            'success' => true,
            'message' => 'Connection test feature coming soon!'
        ]);
    }
}
