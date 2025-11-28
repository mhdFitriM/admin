<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Server') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('servers.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Server Name
                                    *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- IP Address -->
                            <div>
                                <label for="ip_address"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">IP
                                    Address</label>
                                <input type="text" name="ip_address" id="ip_address" value="{{ old('ip_address') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="192.168.1.1">
                                @error('ip_address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Port -->
                            <div>
                                <label for="port"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label>
                                <input type="number" name="port" id="port" value="{{ old('port', 22) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('port')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Provider -->
                            <div>
                                <label for="provider"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Provider</label>
                                <input type="text" name="provider" id="provider" value="{{ old('provider') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="AWS, DigitalOcean, etc.">
                                @error('provider')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status *</label>
                                <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                                        Maintenance</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- SSH Username -->
                            <div class="md:col-span-2">
                                <label for="ssh_username"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Username
                                    (Encrypted)</label>
                                <input type="text" name="ssh_username" id="ssh_username"
                                    value="{{ old('ssh_username') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('ssh_username')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- SSH Password -->
                            <div class="md:col-span-2">
                                <label for="ssh_password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Password
                                    (Encrypted)</label>
                                <input type="password" name="ssh_password" id="ssh_password"
                                    value="{{ old('ssh_password') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('ssh_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Will be encrypted in database
                                </p>
                            </div>

                            <!-- SSH Key -->
                            <div class="md:col-span-2">
                                <label for="ssh_key"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">SSH Private Key
                                    (Encrypted)</label>
                                <textarea name="ssh_key" id="ssh_key" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="-----BEGIN RSA PRIVATE KEY-----">{{ old('ssh_key') }}</textarea>
                                @error('ssh_key')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Will be encrypted in database
                                </p>
                            </div>

                            <!-- cPanel URL -->
                            <div class="md:col-span-2">
                                <label for="cpanel_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel
                                    URL</label>
                                <input type="url" name="cpanel_url" id="cpanel_url" value="{{ old('cpanel_url') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="https://cpanel.example.com:2083">
                                @error('cpanel_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- cPanel Username -->
                            <div>
                                <label for="cpanel_username"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel Username
                                    (Encrypted)</label>
                                <input type="text" name="cpanel_username" id="cpanel_username"
                                    value="{{ old('cpanel_username') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('cpanel_username')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- cPanel Password -->
                            <div>
                                <label for="cpanel_password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">cPanel Password
                                    (Encrypted)</label>
                                <input type="password" name="cpanel_password" id="cpanel_password"
                                    value="{{ old('cpanel_password') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('cpanel_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Root Password -->
                            <div class="md:col-span-2">
                                <label for="root_password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Root Password
                                    (Encrypted)</label>
                                <input type="password" name="root_password" id="root_password"
                                    value="{{ old('root_password') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                                @error('root_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Will be encrypted in database
                                </p>
                            </div>

                            <!-- Notes -->
                            <div class="md:col-span-2">
                                <label for="notes"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                                <textarea name="notes" id="notes" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-6">
                            <a href="{{ route('servers.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700">
                                Save Server
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
