<div class="space-y-6">
    <div>
        <x-input-label for="nama" :value="__('Nama')" />
        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama', $anggota?->nama)"
            autocomplete="nama" placeholder="Nama" />
        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
    </div>
    <div>
        <x-input-label for="alamat" :value="__('Alamat')" />
        <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full"
            :value="old('alamat', $anggota?->alamat)" autocomplete="alamat" placeholder="Alamat" />
        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
    </div>
    <div>
        <x-input-label for="no_hp" :value="__('No Hp')" />
        <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
            :value="old('no_hp', $anggota?->no_hp)" autocomplete="no_hp" placeholder="No Hp" />
        <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
            :value="old('email', $anggota?->email)" autocomplete="email" placeholder="Email" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    <div>
        <x-input-label for="tgl_lahir" :value="__('Tgl Lahir')" />
        <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full"
            :value="old('tgl_lahir', $anggota?->tgl_lahir)" autocomplete="tgl_lahir" placeholder="Tgl Lahir" />
        <x-input-error class="mt-2" :messages="$errors->get('tgl_lahir')" />
    </div>
    <div>
        <x-input-label for="tgl_daftar" :value="__('Tgl Daftar')" />
        <x-text-input id="tgl_daftar" name="tgl_daftar" type="date" class="mt-1 block w-full"
            :value="old('tgl_daftar', $anggota?->tgl_daftar)" autocomplete="tgl_daftar" placeholder="Tgl Daftar" />
        <x-input-error class="mt-2" :messages="$errors->get('tgl_daftar')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>