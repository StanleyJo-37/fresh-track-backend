<x-layout>
  <form action="/login/action" method="post" class="flex flex-col gap-4">
    @csrf
    <div class="@error('email') text-red-600 @enderror ">
      <label for="email">Email: </label>
      <input name="email" type="email" id="email" required value="{{old('email')}}" class="border-2">
      @error('email')
        <div>{{ $message }}</div>
      @enderror
    </div>
    <div>
      <label for="password">Password: </label>
      <input name="password" type="password" id="password" required class="border-2">
    </div>

    <button type="submit" class="w-fit rounded-md px-4 py-2 bg-green-600 text-white">Submit</button>
  </form>
</x-layout>