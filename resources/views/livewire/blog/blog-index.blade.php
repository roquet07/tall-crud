<div>
    <div class=" bg-white p-10 m-10  rounded-md flex flex-col">

        <div class=" my-2 py-2 flex justify-between">
            {{-- Search --}}
            <input type="text"
                class="py-3 px-4 block w-56 border-gray-200 rounded-md text-sm focus:border-blue-300 focus:ring-blue-300 "
                wire:model="search">
            {{-- Button --}}
            <button x-data type="button" data-hs-overlay="#hs-large-modal"
                class="py-1 px-3 inline-flex justify-center items-center gap-1 rounded-md border border-transparent font-semibold bg-blue-300 text-white "
                @click="$dispatch('action-modal-blog', {
                    'action': 'Create',
                    'blog': null
                } )">
                Nuevo Post
            </button>
        </div>
        {{-- Content --}}

        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y ">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y ">

                            @foreach ($blogs as $item)
                                <tr class="">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap  text-center text-sm font-medium text-gray-800 ">
                                        {{ $item->title }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap  text-center text-sm font-medium text-gray-800 ">
                                        <div class="flex justify-center">

                                            @if ($item->url_img)
                                                <img src="{{ asset('storage/' . $item->url_img) }}"
                                                    class="h-10 w-10 rounded-md" class="">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap  text-sm text-gray-800 ">
                                        <div class="flex justify-center">
                                            <div class="flex items-center ">
                                                <label
                                                    class="text-sm text-gray-500 mr-3 dark:text-gray-400">Borrador</label>
                                                <input wire:click="statusBlog({{ $item->id }})"
                                                    {{ $item->status ? 'checked' : '' }} type="checkbox"
                                                    id="swich-{{ $item->id }}"
                                                    class="relative  w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-60 rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent  ring-transparent  focus:outline-none appearance-none 
                                          
                                            before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                                                <label
                                                    class="text-sm text-gray-500 ml-3 dark:text-gray-400">Publico</label>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4  gap-2 flex justify-center text-sm font-medium">

                                        <button x-data class="text-gray-800 hover:text-blue-700"
                                            data-hs-overlay="#hs-large-modal"
                                            @click="$dispatch('action-modal-blog', {
                                            'action': 'Edit',
                                            'blog': '{{ $item->id }}'
                                        } )">Edit</button>
                                        <button x-data class="text-red-500 hover:text-red-700"
                                            data-hs-overlay="#delete-modal-blog"
                                            @click="$dispatch('modal-get-delete', {{ $item->id }} ) ">Delete</button>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="my-5 flex gap-2 justify-end">
            {{ $blogs->links() }}
        </div>
    </div>


    {{-- Modal --}}

    <livewire:blog.blog-create />

    <x-modal-delete id="delete-modal-blog" message="Está acción eliminara un Post" />

    {{-- <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" >
        Open modal
      </button> --}}

</div>
