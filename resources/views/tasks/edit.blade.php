<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Tarea
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Título</label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Descripción</label>
                        <textarea name="description" rows="4"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex items-center gap-2">
                        <input type="checkbox" name="completed" id="completed" value="1"
                            {{ $task->completed ? 'checked' : '' }}>
                        <label for="completed" class="text-gray-700 font-semibold">Marcar como completada</label>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">
                            Actualizar Tarea
                        </button>
                        <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                            Cancelar
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
