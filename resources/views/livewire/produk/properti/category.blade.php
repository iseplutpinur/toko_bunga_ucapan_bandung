<div>
    <h4 class="mb-4 text-2xl font-bold">Form Kategori </h4>
    <div>
        <div class="container mx-auto">
            <form method="warna" wire:submit.prevent="store">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" wire:model.lazy="title" class="w-full py-2 rounded">
                    @error('title')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="slug">Slug</label>
                    <input type="text" wire:model.lazy="slug" class="w-full py-2 rounded">
                    @error('title')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="description">Description </label>
                    <textarea wire:model.lazy="description" rows="3" cols="20" class="w-full rounded">
                </textarea>
                    @error('description')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                @if(!$is_edit)
                <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-4 rounded mb-2">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
                @endif
                @if($is_edit)
                <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-4 rounded mb-2">
                    <i class="fa-solid fa-floppy-disk"></i> Update
                </button>
                <button type="button" wire:click="cancelEdit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mb-2">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                @endif
            </form>
        </div>
        @if (session()->has('info'))
        <div class="mb-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('info') }}
        </div>
        @endif
        <div class="flex flex-col mt-8">
            <div class="py-2">
                <div class="min-w-full border-b border-gray-200 shadow">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Nomor
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Title
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Slug
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Description
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Edit
                                </th>
                                <th class="px-6 py-3 text-left text-gray-500 border-b border-gray-200 bg-gray-50">
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach($warnas as $key => $warna)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $start_number + $key + 1 }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="text-sm text-gray-900">
                                        {{ $warna->title }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="text-sm text-gray-900">
                                        {{ $warna->slug }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <div class="text-sm text-gray-900">
                                        {{ $warna->description }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 border-b border-gray-200">
                                    <button wire:click="edit({{ $warna->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mb-22">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
                                    <button wire:click="destroy({{ $warna->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded mb-22">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $warnas->links() }}
            </div>
        </div>
    </div>
</div>
