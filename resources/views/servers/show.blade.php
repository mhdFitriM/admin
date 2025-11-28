<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $server->name }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('servers.edit', $server) }}"
                    class="px-4 py-2 bg-yellow-600 text-white rounded-md text-xs uppercase hover:bg-yellow-700">Edit</a>
                <a href="{{ route('servers.index') }}"
                    class="px-4 py-2 bg-gray-600 text-white rounded-md text-xs uppercase hover:bg-gray-700">Back</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">IP Address</label>
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ $server->ip_address ?? '-' }}:{{ $server->port }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Provider</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $server->provider ?? '-' }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Status</label><span
                            class="px-3 py-1 inline-flex text-sm rounded-full @if ($server->status === 'active') bg-green-100 text-green-800 @elseif($server->status === 'maintenance') bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">{{ ucfirst($server->status) }}</span>
                    </div>
                    @if ($server->cpanel_url)
                        <div><label class="text-sm text-gray-500 dark:text-gray-400">cPanel</label><a
                                href="{{ $server->cpanel_url }}" target="_blank"
                                class="text-blue-600 hover:text-blue-800">{{ $server->cpanel_url }}</a></div>
                    @endif
                </div>
                @if ($server->projects->count() > 0)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Projects on this Server
                        </h3>
                        <div class="space-y-2">
                            @foreach ($server->projects as $project)
                                <div
                                    class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <span class="text-gray-900 dark:text-white">{{ $project->name }}</span>
                                    <a href="{{ route('projects.show', $project) }}"
                                        class="text-blue-600 hover:text-blue-800">View</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
