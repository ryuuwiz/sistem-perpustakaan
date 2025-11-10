<div class="space-y-6">
    <div>
        <x-input-label for="nominal" :value="__('Nominal Denda')" />
        <x-text-input id="nominal" name="nominal" type="number" step="0.01" min="0" class="mt-1 block w-full"
            :value="old('nominal', $denda?->nominal)" autocomplete="nominal" placeholder="1000" />
        <x-input-error class="mt-2" :messages="$errors->get('nominal')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
