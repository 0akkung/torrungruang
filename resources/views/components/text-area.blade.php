<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                    @error($name) border-red-500 @enderror"
              placeholder="{{ $placeholder }}">{{ $value }}</textarea>

    @error($name)
    <div class="text-red-400 text-sm">
        {{ $message }}
    </div>
    @enderror
</div>
