<x-app-layout>
    <div class="w-4/5 px-4 py-8 mx-auto">
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2">
                {{-- Add slider --}}
                {{-- <div class="container slider">
                    @foreach ($product->images as $image)
                        <img class="image" src="{{$image->url}}">
                    @endforeach
                </div> --}}

                <img class="object-cover w-full rounded-lg shadow-md" src="{{ asset('images/' .  $product->images->first()->url ) }}"
                    alt="{{ $product->name }}">
            </div>
            <div class="w-full mt-4 md:w-1/2 md:ml-8 md:mt-0">
                <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                <div class="mt-4">
                    <span class="text-2xl font-bold text-red-500">${{ $product->price }}</span>
                    <span class="ml-4 text-gray-600">Stock: {{ $product->stock }}</span>
                </div>
                <div class="mt-6">
                    <button
                        class="px-6 py-2 font-bold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>


        <div class="mt-8">
            <h2 class="text-2xl font-bold">Customer Reviews</h2>
            <div class="mt-4 space-y-4">
                <!-- Loop through reviews -->
                @foreach ($product->reviews as $review)
                    <div class="p-4 border rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <span class="text-lg font-bold text-gray-900">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $review->stars)
                                            ★ <!-- Full star using Unicode character -->
                                        @else
                                            ☆ <!-- Empty star using Unicode character -->
                                        @endif
                                    @endfor
                                </span>
                                <span class="ml-2 text-gray-600">- {{ $review->user->name ." ". $review->id}} </span>
                            </div>
                            <span
                                class="ml-auto text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mt-2 text-gray-600">{{ $review->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @auth
            <form method="POST" action="/product/review" class="flex flex-col w-4/5 gap-3 mt-8">
                @csrf
                <h2 class="text-2xl font-bold">Write a review</h2>
                <textarea name="review"> </textarea>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <label for="stars" class="mr-2 text-gray-700">Your Rating:</label>
                        <select name="stars" id="stars"
                            class="border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <input type="file" class="border-2" name="images">
                </div>

                <x-primary-button type="submit">Post</x-primary-button>
            </form>
        @endauth

        @guest
            <h1>
                Log in to write a review
            </h1>
        @endguest
</x-app-layout>
