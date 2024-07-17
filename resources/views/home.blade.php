<x-app-layout>

    <div class="flex flex-col items-center justify-center w-full h-full ">
        <div class="w-4/5">
            @if (request()->routeIs('home'))
                <h1
                    class="w-4/5 my-4 mr-auto text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
                    All products:</h1>
            @else
                <h1
                    class="w-4/5 my-4 mr-auto text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">

                    {{ $categories->firstWhere('id', request()->route('id'))->name }}:</h1>
            @endif
            <hr class="my-4 border-black shadow-sm border-t-5">
        </div>


        <div class='grid w-4/5 grid-cols-4 gap-4 my-3'>
            @foreach ($products as $product)
                <div class="relative overflow-hidden text-left transition-transform bg-white shadow-lg h-72 rounded-2xl hover:-translate-y-1">
                    
                    {{-- admin buttons --}}
                    @can('create', App\Models\Product::class)
                        <div class="absolute top-0 right-0 z-10 flex mt-2 mr-2 space-x-1">
                            {{-- edit button --}}
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                class="p-1 text-white rounded-2xl bg-secondary hover:bg-secondary-dark">
                                <svg class="w-6 h-6 pl-0.5 text-white " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>

                            </a>

                            {{-- delete button --}}
                            <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-white rounded-2xl bg-primary hover:bg-primary-dark">
                                    <svg class="w-6 h-6 px-0.5 text-white " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>

                                </button>
                            </form>
                        </div>
                    @endcan
                    {{-- end of admin buttons --}}

                    <a href="{{ route('product.details', ['id' => $product->id]) }}">
                        <div class="bg-center bg-cover h-3/5"
                            style="background-image:url('{{ asset('images/products/' . $product->images->first()->url) }}') ">
                        </div>
                        <div class="flex flex-col justify-between p-3 h-2/5">
                            <h2 class="text-lg font-semibold leading-tight">{{ Str::limit($product->name, 45) }}</h2>
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-xl font-bold text-red-500">${{ number_format($product->price, 2) }}</span>
                                <span class="text-gray-600">Stock: {{ $product->stock }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
