<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\Project;
use App\Models\Server;
use App\Models\DatabaseCredential;
use App\Models\StoredFile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $stats = [
            'credentials' => Credential::where('user_id', $user->id)->count(),
            'projects' => Project::where('user_id', $user->id)->count(),
            'servers' => Server::where('user_id', $user->id)->count(),
            'database_credentials' => DatabaseCredential::where('user_id', $user->id)->count(),
            'files' => StoredFile::where('user_id', $user->id)->count(),
        ];

        $recentProjects = Project::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $recentCredentials = Credential::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $recentFiles = StoredFile::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'recentProjects', 'recentCredentials', 'recentFiles'));
    }
}
