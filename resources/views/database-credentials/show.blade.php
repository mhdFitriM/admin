<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Database Credential Details</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Name</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $databaseCredential->name }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Type</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $databaseCredential->type }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Host</label>
                        <p class="text-lg text-gray-900 dark:text-white">
                            {{ $databaseCredential->host }}:{{ $databaseCredential->port }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Database</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $databaseCredential->database_name }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Username (Encrypted)</label>
                        <p class="text-lg text-gray-900 dark:text-white">{{ $databaseCredential->username }}</p>
                    </div>
                    <div><label class="text-sm text-gray-500 dark:text-gray-400">Password (Encrypted)</label>
                        <p class="text-lg text-gray-900 dark:text-white">••••••••</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('database-credentials.edit', $databaseCredential) }}"
                        class="px-4 py-2 bg-yellow-600 text-white rounded-md text-xs uppercase">Edit</a>
                    <a href="{{ route('database-credentials.index') }}"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md text-xs uppercase">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
