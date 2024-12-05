<div class="flex border-2 items-center gap-5 w-fit rounded-md p-2">

    <div class="w-24 h-24 rounded-full overflow-hidden">
        <img src="https://placehold.co/400" alt="placeholder" class="object-cover">
    </div>

    <div class="flex-1">
        <div>
            local: {{$food['local_name']}}
        </div>
        <div>
            scientific: {{$food['scientific_name']}}
        </div>
        <div>
            serve size(grams): {{$food['serving_size_g']}}
        </div>
    </div>
    
    <div>
        <button class="bg-green-600 text-white px-2 py-1 rounded-sm">
            Edit
        </button>
        <button class="bg-red-600 text-white px-2 py-1 rounded-sm">
            Delete
        </button>
    </div>
</div>