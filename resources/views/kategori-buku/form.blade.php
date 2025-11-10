<div class="space-y-6">
    <div>
        <x-input-label for="kategori" :value="__('Kategori')" />
        <x-text-input id="kategori" name="kategori" type="text" class="mt-1 block w-full"
            :value="old('kategori', $kategoriBuku?->kategori)" autocomplete="kategori" placeholder="Kategori" />
        <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>