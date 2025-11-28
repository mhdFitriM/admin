<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Files</h2>
            <a href="{{ route('files.create') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">Upload
                File</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}</div>
            @endif
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if ($files->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($files as $file)
                            <div class="border dark:border-gray-700 rounded-lg p-4 hover:shadow-lg transition">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-4xl">📄</span>
                                    <span class="text-xs text-gray-500">{{ $file->file_size_formatted }}</span>
                                </div>
                                <h3 class="font-medium text-gray-900 dark:text-white truncate">{{ $file->name }}</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $file->category ?? 'Uncategorized' }}</p>
                                @if ($file->project)
                                    <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">{{ $file->project->name }}
                                    </p>
                                @endif
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('files.download', $file) }}"
                                        class="text-green-600 hover:text-green-800" title="Download">⬇️</a>
                                    <a href="{{ route('files.edit', $file) }}"
                                        class="text-yellow-600 hover:text-yellow-800" title="Edit">✏️</a>
                                    <form action="{{ route('files.destroy', $file) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Delete?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                            title="Delete">🗑️</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">{{ $files->links() }}</div>
                @else
                    <div class="text-center py-12">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-white">No files</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload your first file.</p>
                        <div class="mt-6">
                            <a href="{{ route('files.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md text-xs uppercase hover:bg-red-700">Upload
                                File</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
