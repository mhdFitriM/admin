<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $project->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('projects.edit', $project) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700">
                    Edit
                </a>
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Project Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Project Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Status</label>
                            <span
                                class="mt-1 px-3 py-1 inline-flex text-sm rounded-full 
                                @if ($project->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                @elseif($project->status === 'development') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                @else bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-200 @endif">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        @if ($project->server)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Server</label>
                                <p class="mt-1 text-lg text-gray-900 dark:text-white">{{ $project->server->name }}</p>
                            </div>
                        @endif
                        @if ($project->github_url)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">GitHub</label>
                                <a href="{{ $project->github_url }}" target="_blank"
                                    class="mt-1 text-blue-600 hover:text-blue-800 dark:text-blue-400">{{ $project->github_url }}</a>
                            </div>
                        @endif
                        @if ($project->live_url)
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Live
                                    URL</label>
                                <a href="{{ $project->live_url }}" target="_blank"
                                    class="mt-1 text-green-600 hover:text-green-800 dark:text-green-400">{{ $project->live_url }}</a>
                            </div>
                        @endif
                    </div>
                    @if ($project->description)
                        <div class="mt-6">
                            <label
                                class="block text-sm font-medium text-gray-500 dark:text-gray-400">Description</label>
                            <p class="mt-1 text-gray-900 dark:text-white">{{ $project->description }}</p>
                        </div>
                    @endif
                    @if ($project->tech_stack && count($project->tech_stack) > 0)
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Tech
                                Stack</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project->tech_stack as $tech)
                                    <span
                                        class="px-3 py-1 text-sm bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Database Credentials -->
            @if ($project->databaseCredentials->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Database Credentials</h3>
                        <div class="space-y-3">
                            @foreach ($project->databaseCredentials as $db)
                                <div
                                    class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $db->name }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $db->type }} -
                                            {{ $db->host }}:{{ $db->port }}</p>
                                    </div>
                                    <a href="{{ route('database-credentials.show', $db) }}"
                                        class="text-blue-600 hover:text-blue-800 dark:text-blue-400">View</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Files -->
            @if ($project->files->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Files</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($project->files as $file)
                                <div
                                    class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                            {{ $file->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $file->file_size_formatted }}</p>
                                    </div>
                                    <a href="{{ route('files.download', $file) }}"
                                        class="ml-2 text-green-600 hover:text-green-800">⬇️</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
