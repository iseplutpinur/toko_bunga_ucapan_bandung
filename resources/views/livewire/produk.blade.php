<div>
    <div class="flex mb-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <button wire:click="showModal()"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-4 rounded mb-2">
                <i class="fa-solid fa-plus"></i> Buat Produk
            </button>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <input wire:model="search" type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                placeholder="Search Produk...">
        </div>
    </div>

    @if($isOpen)
    @include('livewire.produk-modal')
    @endif

    @if(session()->has('info'))
    <script>
        alert("{{ session('info') }}");
    </script>
    @endif

    <div class="flex flex-col">
        <div class="py-2">
            <div class="min-w-full border-b border-gray-200 shadow">
                <table class="min-w-full border-collapse block md:table">
                    <thead class="block md:table-header-group">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                No</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Nama</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Slug</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Warna</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Kategori</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Harga</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Kutipan</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Deskripsi</th>
                            <th
                                class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody class="block md:table-row-group">
                        @foreach($mahasiswas as $key => $mahasiswa)
                        <tr
                            class="bg-{{(($key+1) % 2) == 0 ? 'white':'gray-300' }} border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">No
                                </span>
                                {{ $key+1 }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Nama
                                </span>
                                {{ $mahasiswa->nama }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Slug
                                </span>
                                {{ $mahasiswa->slug }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Warna
                                </span>
                                {{ isset($mahasiswa->color->title) ? $mahasiswa->color->title: '' }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Kategori
                                </span>
                                {{ isset($mahasiswa->category->title) ? $mahasiswa->category->title: '' }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Harga
                                </span>
                                {{ $mahasiswa->harga }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Kutipan
                                </span>
                                {{ $mahasiswa->kutipan }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Deskripsi
                                </span>
                                {{ $mahasiswa->deskripsi }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">Actions
                                </span>
                                <button wire:click="edit({{ $mahasiswa->id }})"
                                    class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                                <button wire:click="destroy({{ $mahasiswa->id}})"
                                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
