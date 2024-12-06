<x-layout>
  <div>

    <div class="my-4">
      <a href="/foods" class="bg-blue-500 text-xl w-fit p-2 rounded-md text-white">
        < Back
          </a>
    </div>

    @if(session('success'))
      <div style="color: green;">
        {{ session('success') }}
      </div>
    @endif

    <h2 class="text-2xl mb-4">Edit Food : {{ $food['local_name']}}</h2>

    <form class="flex flex-col gap-8"
      action="/food/{{$food['id']}}" method="POST">
      @csrf

      <div class="flex flex-wrap gap-4">
        <!-- General -->
        <div class="flex flex-col flex-1 max-w-96">
          <h2 class="text-lg font-semibold">General</h2>

          <div class="w-full flex justify-between gap-4">
            <label for="image">Image</label>
            <input name="image" type="file" id="image" />
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="local_name">Local Name:</label>
            <input name="local_name" type="text" id="local_name" required class="border-2" value="{{ $food['local_name']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="scientific_name">Scientific Name:</label>
            <input name="scientific_name" type="text" id="scientific_name" required class="border-2" value="{{ $food['scientific_name']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="serving_size_g">Serving Size:</label>
            <input name="serving_size_g" type="number" id="serving_size_g" required class="border-2 w-20" value="{{ $food['serving_size_g']}}"/>
          </div>
        </div>

        <!-- Macronutrient -->
        <div class="flex flex-col flex-1 max-w-96">
          <h2 class="text-lg font-semibold">Macronutrient</h2>
          <div class="w-full flex justify-between gap-4">
            <label for="calories">Calories:</label>
            <input name="macronutrient[calories]" type="number" id="calories" class="border-2 w-20" value="{{ $food['macronutrient']['calories']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="sugars_g">Sugar (grams):</label>
            <input name="macronutrient[sugars_g]" type="number" id="sugars_g" class="border-2 w-20" value="{{ $food['macronutrient']['sugars_g']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="fibers_g">Fiber (grams):</label>
            <input name="macronutrient[fibers_g]" type="number" id="fibers_g" class="border-2 w-20" value="{{ $food['macronutrient']['fibers_g']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="starch_g">Starch (grams):</label>
            <input name="macronutrient[starch_g]" type="number" id="starch_g" class="border-2 w-20" value="{{ $food['macronutrient']['starch_g']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="proteins_g">Protein (grams):</label>
            <input name="macronutrient[proteins_g]" type="number" id="proteins_g" class="border-2 w-20" value="{{ $food['macronutrient']['proteins_g']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="saturated_fats_g">Saturated Fats (grams):</label>
            <input name="macronutrient[saturated_fats_g]" type="number" id="saturated_fats_g" class="border-2 w-20" value="{{ $food['macronutrient']['saturated_fats_g']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="unsaturated_fats_g">Unsaturated Fatas (grams):</label>
            <input name="macronutrient[unsaturated_fats_g]" type="number" id="unsaturated_fats_g" class="border-2 w-20" value="{{ $food['macronutrient']['unsaturated_fats_g']}}"/>
          </div>
        </div>

        <!-- Macromineral -->
        <div class="flex flex-col flex-1 max-w-96">
          <h2 class="text-lg font-semibold">Macromineral</h2>
          <div class="w-full flex justify-between gap-4">
            <label for="calcium">Calcium:</label>
            <input name="macromineral[calcium]" type="number" id="calcium" class="border-2 w-20" value="{{ $food['macromineral']['calcium']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="phosphorus">Phosphorus:</label>
            <input name="macromineral[phosphorus]" type="number" id="phosphorus" class="border-2 w-20" value="{{ $food['macromineral']['phosphorus']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="magnesium">Magnesium:</label>
            <input name="macromineral[magnesium]" type="number" id="magnesium" class="border-2 w-20" value="{{ $food['macromineral']['magnesium']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="sodium">Sodium:</label>
            <input name="macromineral[sodium]" type="number" id="sodium" class="border-2 w-20" value="{{ $food['macromineral']['sodium']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="chloride">Chloride:</label>
            <input name="macromineral[chloride]" type="number" id="chloride" class="border-2 w-20" value="{{ $food['macromineral']['chloride']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="potassium">Potassium:</label>
            <input name="macromineral[potassium]" type="number" id="potassium" class="border-2 w-20" value="{{ $food['macromineral']['potassium']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="sulfur">Sulfur:</label>
            <input name="macromineral[sulfur]" type="number" id="sulfur" class="border-2 w-20" value="{{ $food['macromineral']['sulfur']}}"/>
          </div>
        </div>

        <!-- Macronutrient -->
        <div class="flex flex-col flex-1 max-w-96">
          <h2 class="text-lg font-semibold">Micronutrient</h2>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b1">Vitamin B1:</label>
            <input name="micronutrient[vitamin_b1]" type="number" id="vitamin_b1" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b1']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b2">Vitamin B2:</label>
            <input name="micronutrient[vitamin_b2]" type="number" id="vitamin_b2" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b2']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b3">Vitamin B3:</label>
            <input name="micronutrient[vitamin_b3]" type="number" id="vitamin_b3" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b3']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b5">Vitamin B5:</label>
            <input name="micronutrient[vitamin_b5]" type="number" id="vitamin_b5" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b5']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b6">Vitamin B6:</label>
            <input name="micronutrient[vitamin_b6]" type="number" id="vitamin_b6" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b6']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b7">Vitamin B7:</label>
            <input name="micronutrient[vitamin_b7]" type="number" id="vitamin_b7" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b7']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b9">Vitamin B9:</label>
            <input name="micronutrient[vitamin_b9]" type="number" id="vitamin_b9" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b9']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_b12">Vitamin B12:</label>
            <input name="micronutrient[vitamin_b12]" type="number" id="vitamin_b12" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_b12']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_c">Vitamin C:</label>
            <input name="micronutrient[vitamin_c]" type="number" id="vitamin_c" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_c']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_a">Vitamin A:</label>
            <input name="micronutrient[vitamin_a]" type="number" id="vitamin_a" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_a']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_d">Vitamin D:</label>
            <input name="micronutrient[vitamin_d]" type="number" id="vitamin_d" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_d']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_e">Vitamin E:</label>
            <input name="micronutrient[vitamin_e]" type="number" id="vitamin_e" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_e']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="vitamin_k">Vitamin K:</label>
            <input name="micronutrient[vitamin_k]" type="number" id="vitamin_k" class="border-2 w-20" value="{{ $food['micronutrient']['vitamin_k']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="iron">Iron:</label>
            <input name="micronutrient[iron]" type="number" id="iron" class="border-2 w-20" value="{{ $food['micronutrient']['iron']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="manganese">Manganese:</label>
            <input name="micronutrient[manganese]" type="number" id="manganese" class="border-2 w-20" value="{{ $food['micronutrient']['manganese']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="copper">Copper:</label>
            <input name="micronutrient[copper]" type="number" id="copper" class="border-2 w-20" value="{{ $food['micronutrient']['copper']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="zinc">Zinc:</label>
            <input name="micronutrient[zinc]" type="number" id="zinc" class="border-2 w-20" value="{{ $food['micronutrient']['zinc']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="iodine">Iodine:</label>
            <input name="micronutrient[iodine]" type="number" id="iodine" class="border-2 w-20" value="{{ $food['micronutrient']['iodine']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="fluoride">Fluoride:</label>
            <input name="micronutrient[fluoride]" type="number" id="fluoride" class="border-2 w-20" value="{{ $food['micronutrient']['fluoride']}}"/>
          </div>

          <div class="w-full flex justify-between gap-4">
            <label for="selenium">Selenium:</label>
            <input name="micronutrient[selenium]" type="number" id="selenium" class="border-2 w-20" value="{{ $food['micronutrient']['selenium']}}"/>
          </div>
        </div>
      </div>


      <button type="submit" class="bg-green-500 text-xl w-fit p-2 rounded-md text-white">
        Submit
      </button>

    </form>

  </div>
</x-layout>