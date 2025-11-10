<div class="space-y-6">
    <div>
        <x-input-label for="judul" :value="__('Judul')" />
        <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :value="old('judul', $buku?->judul)"
            autocomplete="judul" placeholder="Judul" />
        <x-input-error class="mt-2" :messages="$errors->get('judul')" />
    </div>
    <div>
        <x-input-label for="pengarang" :value="__('Pengarang')" />
        <x-text-input id="pengarang" name="pengarang" type="text" class="mt-1 block w-full"
            :value="old('pengarang', $buku?->pengarang)" autocomplete="pengarang" placeholder="Pengarang" />
        <x-input-error class="mt-2" :messages="$errors->get('pengarang')" />
    </div>
    <div>
        <x-input-label for="penerbit" :value="__('Penerbit')" />
        <x-text-input id="penerbit" name="penerbit" type="text" class="mt-1 block w-full"
            :value="old('penerbit', $buku?->penerbit)" autocomplete="penerbit" placeholder="Penerbit" />
        <x-input-error class="mt-2" :messages="$errors->get('penerbit')" />
    </div>
    <div>
        <x-input-label for="tahun" :value="__('Tahun')" />
        <x-text-input id="tahun" name="tahun" type="text" class="mt-1 block w-full" :value="old('tahun', $buku?->tahun)"
            autocomplete="tahun" placeholder="Tahun" />
        <x-input-error class="mt-2" :messages="$errors->get('tahun')" />
    </div>
    <div>
        <x-input-label for="isbn" :value="__('Isbn')" />
        <x-text-input id="isbn" name="isbn" type="text" class="mt-1 block w-full" :value="old('isbn', $buku?->isbn)"
            autocomplete="isbn" placeholder="Isbn" />
        <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
    </div>
    <div>
        <x-input-label for="tgl_input" :value="__('Tgl Input')" />
        <x-text-input id="tgl_input" name="tgl_input" type="date" class="mt-1 block w-full"
            :value="old('tgl_input', $buku?->tgl_input)" autocomplete="tgl_input" placeholder="Tgl Input" />
        <x-input-error class="mt-2" :messages="$errors->get('tgl_input')" />
    </div>
    <div>
        <x-input-label for="jml_halaman" :value="__('Jml Halaman')" />
        <x-text-input id="jml_halaman" name="jml_halaman" type="number" class="mt-1 block w-full"
            :value="old('jml_halaman', $buku?->jml_halaman)" autocomplete="jml_halaman" placeholder="Jml Halaman" />
        <x-input-error class="mt-2" :messages="$errors->get('jml_halaman')" />
    </div>
    <div>
        <x-input-label for="id_kategori" :value="__('Id Kategori')" />
        <x-select-input id="id_kategori" name="id_kategori" class="mt-1 block w-full">
            @foreach(\App\Models\KategoriBuku::all() as $kategori)
            <option value="{{ $kategori->id_kategori }}" @selected(old('id_kategori', $buku?->id_kategori) ==
                $kategori->id_kategori)>
                {{ $kategori->kategori }}
            </option>
            @endforeach
        </x-select-input>
        <x-input-error class="mt-2" :messages="$errors->get('id_kategori')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>