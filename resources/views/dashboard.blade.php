<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                <!-- Credentials Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Credentials</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['credentials'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('credentials.index') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400">View all →</a>
                        </div>
                    </div>
                </div>

                <!-- Projects Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Projects</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['projects'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('projects.index') }}" class="text-sm text-green-600 hover:text-green-800 dark:text-green-400">View all →</a>
                        </div>
                    </div>
                </div>

                <!-- Servers Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Servers</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['servers'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('servers.index') }}" class="text-sm text-purple-600 hover:text-purple-800 dark:text-purple-400">View all →</a>
                        </div>
                    </div>
                </div>

                <!-- Database Credentials Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Databases</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['database_credentials'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('database-credentials.index') }}" class="text-sm text-yellow-600 hover:text-yellow-800 dark:text-yellow-400">View all →</a>
                        </div>
                    </div>
                </div>

                <!-- Files Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-text-gray-400">Files</p>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $stats['files'] }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('files.index') }}" class="text-sm text-red-600 hover:text-red-800 dark:text-red-400">View all →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Projects -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Projects</h3>
                            <a href="{{ route('projects.create') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400">Add New</a>
                        </div>
                        @if($recentProjects->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentProjects as $project)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex-1">
                                            <a href="{{ route('projects.show', $project) }}" class="font-medium text-gray-900 dark:text-white hover:text-blue-600">
                                                {{ $project->name }}
                                            </a>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($project->description, 50) }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                            @if($project->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                            @elseif($project->status === 'development') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                            @else bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-200
                                            @endif">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No projects yet. <a href="{{ route('projects.create') }}" class="text-blue-600 hover:text-blue-800">Create your first project</a></p>
                        @endif
                    </div>
                </div>

                <!-- Recent Credentials -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Credentials</h3>
                            <a href="{{ route('credentials.create') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400">Add New</a>
                        </div>
                        @if($recentCredentials->count() > 0)
                            <div class="space-y-3">
                                @foreach($recentCredentials as $credential)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex-1">
                                            <a href="{{ route('credentials.show', $credential) }}" class="font-medium text-gray-900 dark:text-white hover:text-blue-600">
                                                {{ $credential->name }}
                                            </a>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $credential->service ?? $credential->type }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{ $credential->type }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-center py-4">No credentials yet. <a href="{{ route('credentials.create') }}" class="text-blue-600 hover:text-blue-800">Add your first credential</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Files -->
            @if($recentFiles->count() > 0)
                <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Files</h3>
                            <a href="{{ route('files.create') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400">Upload New</a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($recentFiles as $file)
                                <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3 flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $file->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $file->file_size_formatted }}</p>
                                    </div>
                                    <a href="{{ route('files.download', $file) }}" class="ml-2 text-blue-600 hover:text-blue-800">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
