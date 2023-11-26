<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Note
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('create.note')}}" method="POST" class="flex flex-col gap-4 p-10">
                        @csrf
                        <div class="flex flex-col w-1/2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title">
                            @error('title')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col w-1/3">
                            <label for="tags">Tags</label>
                            <input type="text" name="tags" id="tags">
                            @error('tags')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" rows="10"></textarea>
                            @error('body')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-slate-900 text-white py-3 w-1/4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>