<div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">

    <div class="-m-1 flex flex-wrap md:-m-2">
        @foreach ($blogs as $item)
            <div class="flex w-1/3 flex-wrap">
                <div class="w-full p-1 md:p-2 relative">
                    <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center"
                        src="{{ asset('storage/' . $item->url_img) }}" />
                    <div class="absolute top-0 left-0 p-4">
                        <h2 class="text-white text-xl font-bold text-center">{{ $item->title }}</h2>
                        <p class="text-white">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <div>
        <div class=" mt-4 flex justify-around">
            {{$blogs->links()}}
        </div>

    </div>


</div>
