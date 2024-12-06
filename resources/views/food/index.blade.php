<x-layout>

    <div class="my-4">
        <a href="{{ route('foods.create') }}" class="bg-blue-500 text-xl w-fit p-2 rounded-md text-white">
            Add New Food
        </a>

        @if(session('success'))
            <div style="color: green;" class="my-2">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div>
        @isset ($foods)
            @foreach ($foods as $food)
            <x-food-item :food="$food" />
            @endforeach
        @endisset
    </div>

</x-layout>