<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" autocomplete="off"
           placeholder="{{ $placeholder }}"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                @error($name) border-red-500 @enderror">
    @error($name)
    <div class="text-red-400 text-sm">
        {{ $message }}
    </div>
    @enderror
</div>
