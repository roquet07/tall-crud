<div x-data="{
    description: @entangle('description'),
    title: @entangle('title'),
    setActionModal(data) {

        if (data.action == 'Create') {
            this.resetData() //Limpia los campos en caso de tener algun valor
            $dispatch('action-clear-data-ckeditor') //Limpia el ckeditor en caso de tener algun valor
            @this.create(); //Metodo que resetea un objeto vacio

        } else {
            @this.edit(data.blog); //Metodo que carga la data de un blog si encuentra su id

        }
    },
    resetData() {
        this.title = '';
        this.description = '';
    },
}" @action-modal-blog.window="setActionModal($event.detail)">
    <div id="hs-large-modal" wire:ignore.self
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
                <div class="flex justify-between items-center py-3 px-4 border-b ">
                    <h3 class="font-bold text-gray-400 dark:text-white">
                        Modal title
                    </h3>
                    <button type="button"
                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-large-modal">
                        <span class="sr-only">Close</span>
                        <x-icon-x />
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="p-4 overflow-y-auto">
                        <div>
                            <label for="input-label" class="block text-sm font-medium mb-2 ">Title</label>
                            <input wire:model.defer="title" x-model="title" type="text" id="input-label"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-300 focus:ring-blue-300"
                                placeholder="Your title">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-1" x-data="{ isUploading: @entangle('isUploading'), progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = true"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">

                            {{-- <div class="flex flex-col items-center justify-center align-middle  my-2">
       
       
       
                            <svg wire:loading wire:target="url" width="25" viewBox="-2 -2 42 42"
                                xmlns="http://www.w3.org/2000/svg" stroke="rgb(30, 41, 59)" class="w-10 h-10 text-lg">
                                <g fill="none" fill-rule="evenodd">
                                    <g transform="translate(1 1)" stroke-width="4">
                                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                        <path d="M36 18c0-9.94-8.06-18-18-18">
                                            <animateTransform attributeName="transform" type="rotate" from="0 18 18"
                                                to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <p wire:loading wire:target="url" class="text-lg">Cargando pdf
                                ...</p>
       
       
                        </div> --}}
                            <label class="form-label">Image</label>
                            <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">


                                <div class="px-4 pb-4 flex items-center cursor-pointer relative dark:text-gray-500">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                        class=" dark:text-gray-300 mr-1">upload your image</span>
                                    <input type="file" wire:model.defer="url_img" accept="img/*"
                                        class="w-full h-full top-0 left-0 absolute opacity-0 ">

                                </div>
                            </div>
                            {{-- <x-error property="url_img" /> --}}
                            @error('url_img')
                            @enderror
                            <!-- Progress Bar -->
                            <div x-show="isUploading" class="bg-gray-200 h-[20px] w-ful  mt-3 rounded-md"
                                style="display: none">
                                <div class="bg-blue-500 h-[20px] text-center  text-white rounded-md"
                                    style="transition: width 2s" :style="`width: ${progress}%`" x-show="isUploading"
                                    x-text="`${progress} %`">
                                </div>

                            </div>

                        </div>

                        <div>
                            <label for="input-label" class="block text-sm font-medium mb-2 ">Description</label>
                            <x-editor wire:model="description" xModel="description" x-model="description" />
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="flex items-center my-4 ">
                            <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Borrador</label>
                            <input type="checkbox" wire:model.defer="status"
                                class="relative  w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-60 rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent  ring-transparent  focus:outline-none appearance-none 
                      
                        before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                            <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Publico</label>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                            class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                            data-hs-overlay="#hs-large-modal">
                            Close
                        </button>
                        <button type="submit"
                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-300 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        document.addEventListener('DOMContentLoades', () => {

            Livewire.hook('message.processed', (message, component) => {
                initializeCkEditor();

            })
        })
    </script> --}}
</div>
