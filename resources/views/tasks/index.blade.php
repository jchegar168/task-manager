<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Nueva Tarea
                </a>
            </div>

            <div class="bg-white shadow rounded-lg divide-y">
                @forelse($tasks as $task)
                    <div class="p-4 flex items-center justify-between">
                        <div>
                            <p class="font-semibold {{ $task->completed ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </p>
                            <p class="text-sm text-gray-500">{{ $task->description }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                Editar
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('¿Seguro que quieres eliminar esta tarea?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-gray-500">No tienes tareas todavía.</div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>