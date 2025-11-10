<div class="space-y-6">
    <div>
        <x-input-label for="tgl_pinjam" :value="__('Tanggal Pinjam')" />
        <x-text-input id="tgl_pinjam" name="tgl_pinjam" type="date" class="mt-1 block w-full"
            :value="old('tgl_pinjam', $peminjaman?->tgl_pinjam)" autocomplete="tgl_pinjam" />
        <x-input-error class="mt-2" :messages="$errors->get('tgl_pinjam')" />
    </div>

    <div>
        <x-input-label for="lama_pinjam" :value="__('Lama Pinjam (hari)')" />
        <x-text-input id="lama_pinjam" name="lama_pinjam" type="number" min="1" class="mt-1 block w-full"
            :value="old('lama_pinjam', $peminjaman?->lama_pinjam)" autocomplete="lama_pinjam" placeholder="Contoh: 7" />
        <x-input-error class="mt-2" :messages="$errors->get('lama_pinjam')" />
    </div>

    <div>
        <x-input-label for="id_anggota" :value="__('Anggota')" />
        <x-select-input id="id_anggota" name="id_anggota" class="mt-1 block w-full">
            <option value="" disabled {{ old('id_anggota', $peminjaman?->id_anggota) ? '' : 'selected' }}>
                {{ __('Pilih Anggota') }}
            </option>
            @foreach ($anggotaOptions as $anggota)
            <option value="{{ $anggota->id_anggota }}" @selected(old('id_anggota', $peminjaman?->id_anggota) == $anggota->id_anggota)>
                {{ $anggota->nama }}
            </option>
            @endforeach
        </x-select-input>
        <x-input-error class="mt-2" :messages="$errors->get('id_anggota')" />
    </div>

    <div>
        <x-input-label for="id_denda" :value="__('Denda')" />
        <x-select-input id="id_denda" name="id_denda" class="mt-1 block w-full">
            <option value="" disabled {{ old('id_denda', $peminjaman?->id_denda) ? '' : 'selected' }}>
                {{ __('Pilih Denda') }}
            </option>
            @foreach ($dendaOptions as $denda)
            <option value="{{ $denda->id_denda }}" @selected(old('id_denda', $peminjaman?->id_denda) == $denda->id_denda)>
                Rp {{ number_format($denda->nominal, 2, ',', '.') }}
            </option>
            @endforeach
        </x-select-input>
        <x-input-error class="mt-2" :messages="$errors->get('id_denda')" />
    </div>

    @php
        $selectedBukuIds = collect(old('buku_ids', $peminjaman?->detailPinjam->pluck('id_buku')->toArray() ?? []))
            ->map(fn ($id) => (int) $id)
            ->all();
    @endphp
    <div>
        <x-input-label for="buku_ids" :value="__('Buku yang Dipinjam')" />
        <x-select-input id="buku_ids" name="buku_ids[]" multiple size="6" class="mt-1 block w-full">
            @foreach ($bukuOptions as $buku)
            <option value="{{ $buku->id_buku }}" @selected(in_array($buku->id_buku, $selectedBukuIds))>
                {{ $buku->judul }}
            </option>
            @endforeach
        </x-select-input>
        <p class="mt-2 text-xs text-gray-500">{{ __('Tahan CTRL atau CMD untuk memilih lebih dari satu buku.') }}</p>
        <x-input-error class="mt-2" :messages="$errors->get('buku_ids')" />
        <x-input-error class="mt-2" :messages="$errors->get('buku_ids.*')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
