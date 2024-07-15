<x-app-layout>
   <div class="container w-4/5 px-4 mx-auto">
        <h1 class="my-4 text-3xl font-bold">Shopping Cart</h1>

        @if(session('success'))
            <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(empty($cartItems))
            <p class="text-gray-500">Your cart is empty.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="w-full text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">Product</th>
                            <th class="px-6 py-3 text-center">Quantity</th>
                            <th class="px-6 py-3 text-center">Price</th>
                            <th class="px-6 py-3 text-center">Total</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @foreach($cartItems as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img src="{{ asset("images/products/" . $item['image']) }}" alt="{{ $item['name'] }}" class="object-cover w-10 h-10">
                                        </div>
                                        <span>{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ $item['quantity'] }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ $item['price'] }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ $item['price'] * $item['quantity'] }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <form action="{{ route('cart.remove') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-right">
                <p class="text-lg font-bold">Total: {{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cartItems)) }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
