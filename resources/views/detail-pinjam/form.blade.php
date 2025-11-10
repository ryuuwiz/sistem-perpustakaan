<div class="space-y-6">
    
    <div>
        <x-input-label for="id_pinjam" :value="__('Id Pinjam')"/>
        <x-text-input id="id_pinjam" name="id_pinjam" type="text" class="mt-1 block w-full" :value="old('id_pinjam', $detailPinjam?->id_pinjam)" autocomplete="id_pinjam" placeholder="Id Pinjam"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_pinjam')"/>
    </div>
    <div>
        <x-input-label for="id_buku" :value="__('Id Buku')"/>
        <x-text-input id="id_buku" name="id_buku" type="text" class="mt-1 block w-full" :value="old('id_buku', $detailPinjam?->id_buku)" autocomplete="id_buku" placeholder="Id Buku"/>
        <x-input-error class="mt-2" :messages="$errors->get('id_buku')"/>
    </div>
    <div>
        <x-input-label for="tgl_kembali" :value="__('Tgl Kembali')"/>
        <x-text-input id="tgl_kembali" name="tgl_kembali" type="text" class="mt-1 block w-full" :value="old('tgl_kembali', $detailPinjam?->tgl_kembali)" autocomplete="tgl_kembali" placeholder="Tgl Kembali"/>
        <x-input-error class="mt-2" :messages="$errors->get('tgl_kembali')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>