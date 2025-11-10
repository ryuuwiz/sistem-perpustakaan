<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Informasi Peminjaman') }}</h1>
                        <p class="mt-2 text-sm text-gray-700">Ringkasan transaksi peminjaman dan denda yang tercatat.</p>
                    </div>
                    <a type="button" href="{{ route('peminjaman.index') }}"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                </div>

                <dl class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Anggota</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $peminjaman->anggota->nama ?? '-' }}</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Tanggal Pinjam</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($peminjaman->tgl_pinjam)->translatedFormat('d F Y') }}</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Lama Pinjam</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $peminjaman->lama_pinjam }} hari</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Denda</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">Rp {{ number_format($peminjaman->denda->nominal ?? 0, 2, ',', '.') }}</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Petugas</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $peminjaman->user->name ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-base font-semibold leading-6 text-gray-900 mb-4">{{ __('Detail Buku Yang Dipinjam') }}</h2>

                <div class="flow-root">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Judul Buku</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Tanggal Kembali</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse ($peminjaman->detailPinjam as $detail)
                                    <tr class="even:bg-gray-50">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $detail->buku->judul ?? '-' }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $detail->tgl_kembali ? \Carbon\Carbon::parse($detail->tgl_kembali)->translatedFormat('d M Y') : '-' }}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-3 py-4 text-sm text-gray-500 text-center">Belum ada detail peminjaman.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
