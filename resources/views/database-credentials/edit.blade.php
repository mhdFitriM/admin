<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Database Credential</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('database-credentials.update', $databaseCredential) }}">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name *</label><input
                                type="text" name="name" value="{{ old('name', $databaseCredential->name) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type
                                *</label><select name="type" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="mysql" {{ $databaseCredential->type == 'mysql' ? 'selected' : '' }}>
                                    MySQL</option>
                                <option value="postgresql"
                                    {{ $databaseCredential->type == 'postgresql' ? 'selected' : '' }}>PostgreSQL
                                </option>
                                <option value="mongodb" {{ $databaseCredential->type == 'mongodb' ? 'selected' : '' }}>
                                    MongoDB</option>
                            </select></div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project</label><select
                                name="project_id"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="">No Project</option>
                                @foreach ($projects as $p)
                                    <option value="{{ $p->id }}"
                                        {{ $databaseCredential->project_id == $p->id ? 'selected' : '' }}>
                                        {{ $p->name }}</option>
                                @endforeach
                            </select></div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Host
                                *</label><input type="text" name="host"
                                value="{{ old('host', $databaseCredential->host) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port
                                *</label><input type="number" name="port"
                                value="{{ old('port', $databaseCredential->port) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Database Name
                                *</label><input type="text" name="database_name"
                                value="{{ old('database_name', $databaseCredential->database_name) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username *
                                (Encrypted)</label><input type="text" name="username"
                                value="{{ old('username', $databaseCredential->username) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password *
                                (Encrypted)</label><input type="password" name="password"
                                value="{{ old('password', $databaseCredential->password) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                            <textarea name="notes" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('notes', $databaseCredential->notes) }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('database-credentials.index') }}"
                            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md text-xs uppercase">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-yellow-600 text-white rounded-md text-xs uppercase hover:bg-yellow-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
