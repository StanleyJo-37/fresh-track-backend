<div class="flex border-2 items-center gap-5 w-fit rounded-md p-2">

    <div class="w-24 h-24 rounded-full overflow-hidden">
        <img src="https://placehold.co/400" alt="placeholder" class="object-cover">
    </div>

    <div class="flex-1">
        <div>
            Local : {{$food['local_name']}}
        </div>
        <div>
            Scientific : {{$food['scientific_name']}}
        </div>
        <div>
            Serve Size (grams) : {{$food['serving_size_g']}}
        </div>
    </div>
    
    <div class="flex flex-col gap-2">
        <a href="/food/{{ $food['id'] }}" class="bg-green-600 text-white px-2 py-1 rounded-sm">
            Edit
        </a>

        <form action="/food/{{ $food['id'] }}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded-sm">
                Hapus
            </button>
        </form>

    </div>
</div>