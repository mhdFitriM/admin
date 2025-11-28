<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Upload File</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">File Name
                                *</label><input type="text" name="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300">File * (Max
                                50MB)</label><input type="file" name="file" required
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                        </div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project</label><select
                                name="project_id"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                <option value="">No Project</option>
                                @foreach ($projects as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select></div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label><input
                                type="text" name="category" placeholder="e.g., documentation, config, backup"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                        </div>
                        <div><label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea name="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('files.index') }}"
                            class="px-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md text-xs uppercase">Cancel</a>
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-md text-xs uppercase hover:bg-red-700">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
