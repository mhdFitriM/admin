<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('projects.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project Name
                                    *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- GitHub URL -->
                            <div>
                                <label for="github_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">GitHub
                                    URL</label>
                                <input type="url" name="github_url" id="github_url" value="{{ old('github_url') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('github_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Live URL -->
                            <div>
                                <label for="live_url"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Live URL</label>
                                <input type="url" name="live_url" id="live_url" value="{{ old('live_url') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                @error('live_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status *</label>
                                <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="development" {{ old('status') == 'development' ? 'selected' : '' }}>
                                        Development</option>
                                    <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>
                                        Archived</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Server -->
                            <div>
                                <label for="server_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Server</label>
                                <select name="server_id" id="server_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                    <option value="">No Server</option>
                                    @foreach ($servers as $server)
                                        <option value="{{ $server->id }}"
                                            {{ old('server_id') == $server->id ? 'selected' : '' }}>
                                            {{ $server->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('server_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="md:col-span-2">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tech Stack -->
                            <div class="md:col-span-2">
                                <label for="tech_stack_input"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tech
                                    Stack</label>
                                <input type="text" id="tech_stack_input"
                                    placeholder="e.g., Laravel, React, MySQL (press Enter to add)"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                <div id="tech_stack_tags" class="mt-2 flex flex-wrap gap-2"></div>
                                <input type="hidden" name="tech_stack[]" id="tech_stack_hidden">
                            </div>

                            <!-- Notes -->
                            <div class="md:col-span-2">
                                <label for="notes"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                                <textarea name="notes" id="notes" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end space-x-3 mt-6">
                            <a href="{{ route('projects.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400">
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                                Save Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let techStack = [];
            const input = document.getElementById('tech_stack_input');
            const tagsContainer = document.getElementById('tech_stack_tags');

            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const value = this.value.trim();
                    if (value && !techStack.includes(value)) {
                        techStack.push(value);
                        updateTags();
                        this.value = '';
                    }
                }
            });

            function updateTags() {
                tagsContainer.innerHTML = techStack.map((tech, index) => `
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                    ${tech}
                    <button type="button" onclick="removeTag(${index})" class="ml-2 text-green-600 hover:text-green-800 dark:text-green-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </span>
            `).join('');

                // Update hidden inputs
                const form = document.querySelector('form');
                form.querySelectorAll('input[name="tech_stack[]"]').forEach(el => el.remove());
                techStack.forEach(tech => {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'tech_stack[]';
                    hidden.value = tech;
                    form.appendChild(hidden);
                });
            }

            function removeTag(index) {
                techStack.splice(index, 1);
                updateTags();
            }
        </script>
    @endpush
</x-app-layout>
