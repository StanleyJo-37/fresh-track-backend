<x-layout>
    <div>
        @isset ($foods)
            @foreach ($foods as $food)
                <x-food-item :food="$food"/>
            @endforeach
        @endisset
    </div>
</x-layout>
