<x-app-layout>

    <div class="flex flex-col items-center justify-center w-full h-full">
        <h1 class="my-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-primary from-secondary">Lara</span>Shop</h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at Larashop we focus on markets
            where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>

        <hr class="w-4/5 my-4 border-black shadow-sm border-t-5">
        <div class='grid w-4/5 grid-cols-4 gap-4 my-3'>

            @foreach ($products as $product)
                <a href="{{ route('product.details', ['id' => $product->id]) }}"
                    class="overflow-hidden text-left transition-transform bg-white shadow-lg h-72 rounded-2xl hover:-translate-y-1">
                    <div class="bg-center bg-cover h-3/5" style="background-image: url('{{ $product->image }}');"></div>
                    <div class="flex flex-col justify-between p-3 h-2/5">
                        <h2 class="text-lg font-semibold leading-tight">{{ Str::limit($product->name, 45) }}</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-red-500">${{ number_format($product->price, 2) }}</span>
                            <span class="text-gray-600">Stock: {{ $product->stock }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</x-app-layout>
