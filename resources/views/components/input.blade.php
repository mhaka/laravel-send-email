<div>
    <label for="{{ $name }}" class="block mb-1 font-medium">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500" id="{{ $name }}" value="{{ old($name) }}">
    @error($name)
        <div class="text-red-500">{{ $message }}</div>
    @enderror
</div>