<x-layout>
  <div>

    <div class="my-4">
      <a href="/food" class="bg-blue-500 text-xl w-fit p-2 rounded-md text-white">
        < Back
      </a>
    </div>

    <h2 class="text-2xl mb-4">Create New Food</h2>

    <form class="flex flex-col gap-8">

      <!-- General -->
      <div>
        <h2 class="text-lg font-semibold">General</h2>
        <div>
          <label for="local_name">Local Name:</label>
          <input name="local_name" type="text" id="local_name" required class="border-2" />
        </div>

        <div>
          <label for="scientific_name">Scientific Name:</label>
          <input name="scientific_name" type="text" id="scientific_name" required class="border-2" />
        </div>

        <div>
          <label for="serving_size_g">Serving Size:</label>
          <input name="serving_size_g" type="number" id="serving_size_g" required class="border-2" />
        </div>
      </div>

      <!-- Macronutrient -->
      <div>
        <h2 class="text-lg font-semibold">Macronutrient</h2>
        <div>
          <label for="calories">Calories:</label>
          <input name="calories" type="number" id="calories" required class="border-2" />
        </div>

        <div>
          <label for="sugars_g">Sugar (grams):</label>
          <input name="sugars_g" type="number" id="sugars_g" required class="border-2" />
        </div>

        <div>
          <label for="fibers_g">Fiber (grams):</label>
          <input name="fibers_g" type="number" id="fibers_g" required class="border-2" />
        </div>

        <div>
          <label for="starch_g">Starch (grams):</label>
          <input name="starch_g" type="number" id="starch_g" required class="border-2" />
        </div>

        <div>
          <label for="proteins_g">Protein (grams):</label>
          <input name="proteins_g" type="number" id="proteins_g" required class="border-2" />
        </div>

        <div>
          <label for="saturated_fats_g">Saturated Fats (grams):</label>
          <input name="saturated_fats_g" type="number" id="saturated_fats_g" required class="border-2" />
        </div>

        <div>
          <label for="unsaturated_fats_g">Unsaturated Fatas (grams):</label>
          <input name="unsaturated_fats_g" type="number" id="unsaturated_fats_g" required class="border-2" />
        </div>
      </div>

      <!-- Macromineral -->
      <div>
        <h2 class="text-lg font-semibold">Macromineral</h2>
        <div>
          <label for="calcium">Calcium:</label>
          <input name="calcium" type="number" id="calcium" required class="border-2" />
        </div>

        <div>
          <label for="phosphorus">Phosphorus:</label>
          <input name="phosphorus" type="number" id="phosphorus" required class="border-2" />
        </div>

        <div>
          <label for="magnesium">Magnesium:</label>
          <input name="magnesium" type="number" id="magnesium" required class="border-2" />
        </div>

        <div>
          <label for="sodium">Sodium:</label>
          <input name="sodium" type="number" id="sodium" required class="border-2" />
        </div>

        <div>
          <label for="chloride">Chloride:</label>
          <input name="chloride" type="number" id="chloride" required class="border-2" />
        </div>

        <div>
          <label for="potassium">Potassium:</label>
          <input name="potassium" type="number" id="potassium" required class="border-2" />
        </div>

        <div>
          <label for="sulfur">Sulfur:</label>
          <input name="sulfur" type="number" id="sulfur" required class="border-2" />
        </div>
      </div>

      <!-- Macronutrient -->
      <div>
        <h2 class="text-lg font-semibold">Micronutrient</h2>

        <div>
          <label for="vitamin_b1">Vitamin B1:</label>
          <input name="vitamin_b1" type="number" id="vitamin_b1" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b2">Vitamin B2:</label>
          <input name="vitamin_b2" type="number" id="vitamin_b2" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b3">Vitamin B3:</label>
          <input name="vitamin_b3" type="number" id="vitamin_b3" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b5">Vitamin B5:</label>
          <input name="vitamin_b5" type="number" id="vitamin_b5" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b6">Vitamin B6:</label>
          <input name="vitamin_b6" type="number" id="vitamin_b6" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b7">Vitamin B7:</label>
          <input name="vitamin_b7" type="number" id="vitamin_b7" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b9">Vitamin B9:</label>
          <input name="vitamin_b9" type="number" id="vitamin_b9" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_b12">Vitamin B12:</label>
          <input name="vitamin_b12" type="number" id="vitamin_b12" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_c">Vitamin C:</label>
          <input name="vitamin_c" type="number" id="vitamin_c" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_a">Vitamin A:</label>
          <input name="vitamin_a" type="number" id="vitamin_a" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_d">Vitamin D:</label>
          <input name="vitamin_d" type="number" id="vitamin_d" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_e">Vitamin E:</label>
          <input name="vitamin_e" type="number" id="vitamin_e" required class="border-2" />
        </div>

        <div>
          <label for="vitamin_k">Vitamin K:</label>
          <input name="vitamin_k" type="number" id="vitamin_k" required class="border-2" />
        </div>

        <div>
          <label for="iron">Iron:</label>
          <input name="iron" type="number" id="iron" required class="border-2" />
        </div>

        <div>
          <label for="manganese">Manganese:</label>
          <input name="manganese" type="number" id="manganese" required class="border-2" />
        </div>

        <div>
          <label for="copper">Copper:</label>
          <input name="copper" type="number" id="copper" required class="border-2" />
        </div>

        <div>
          <label for="zinc">Zinc:</label>
          <input name="zinc" type="number" id="zinc" required class="border-2" />
        </div>

        <div>
          <label for="iodine">Iodine:</label>
          <input name="iodine" type="number" id="iodine" required class="border-2" />
        </div>

        <div>
          <label for="fluoride">Fluoride:</label>
          <input name="fluoride" type="number" id="fluoride" required class="border-2" />
        </div>

        <div>
          <label for="selenium">Selenium:</label>
          <input name="selenium" type="number" id="selenium" required class="border-2" />
        </div>
      </div>

      <button class="bg-green-500 text-xl w-fit p-2 rounded-md text-white">
        Submit
      </button>

    </form>
  </div>
</x-layout>