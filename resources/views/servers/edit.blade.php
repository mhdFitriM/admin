<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Server</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('servers.update', $server) }}">
                    @csrf @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name *</label><input
                                type="text" name="name" value="{{ old('name', $server->name) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">IP
                                Address</label><input type="text" name="ip_address"
                                value="{{ old('ip_address', $server->ip_address) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label><input
                                type="number" name="port" value="{{ old('port', $server->port) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provider</label><input
                                type="text" name="provider" value="{{ old('provider', $server->provider) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status
                                *</label><select name="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="active" {{ $server->status == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ $server->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                                <option value="maintenance" {{ $server->status == 'maintenance' ? 'selected' : '' }}>
                                    Maintenance</option>
                            </select></div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Username
                                (Encrypted)</label><input type="text" name="ssh_username"
                                value="{{ old('ssh_username', $server->ssh_username) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Password
                                (Encrypted)</label><input type="password" name="ssh_password"
                                value="{{ old('ssh_password', $server->ssh_password) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Key
                                (Encrypted)</label>
                            <textarea name="ssh_key" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('ssh_key', $server->ssh_key) }}</textarea>
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel
                                URL</label><input type="url" name="cpanel_url"
                                value="{{ old('cpanel_url', $server->cpanel_url) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel Username
                                (Encrypted)</label><input type="text" name="cpanel_username"
                                value="{{ old('cpanel_username', $server->cpanel_username) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel Password
                                (Encrypted)</label><input type="password" name="cpanel_password"
                                value="{{ old('cpanel_password', $server->cpanel_password) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Root Password
                                (Encrypted)</label><input type="password" name="root_password"
                                value="{{ old('root_password', $server->root_password) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div class="col-span-2"><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                            <textarea name="notes" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('notes', $server->notes) }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('servers.index') }}"
                            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md text-xs uppercase">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-purple-600 text-white rounded-md text-xs uppercase hover:bg-purple-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
