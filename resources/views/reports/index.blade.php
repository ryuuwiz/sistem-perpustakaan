<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Cetak Laporan</h1>
                        <p class="mt-2 text-sm text-gray-700">Pilih laporan yang ingin dicetak.</p>
                    </div>
                </div>

                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <a href="{{ route('reports.anggota') }}" target="_blank" rel="noopener"
                        class="rounded-lg border border-gray-200 p-6 shadow-sm hover:border-indigo-500 hover:shadow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <h3 class="text-lg font-semibold text-gray-900">Laporan Anggota</h3>
                        <p class="mt-2 text-sm text-gray-600">Unduh PDF daftar anggota beserta detail kontak.</p>
                    </a>
                    <a href="{{ route('reports.buku') }}" target="_blank" rel="noopener"
                        class="rounded-lg border border-gray-200 p-6 shadow-sm hover:border-indigo-500 hover:shadow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <h3 class="text-lg font-semibold text-gray-900">Laporan Buku</h3>
                        <p class="mt-2 text-sm text-gray-600">Unduh PDF ringkasan koleksi buku dan kategorinya.</p>
                    </a>
                    <a href="{{ route('reports.peminjaman') }}" target="_blank" rel="noopener"
                        class="rounded-lg border border-gray-200 p-6 shadow-sm hover:border-indigo-500 hover:shadow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <h3 class="text-lg font-semibold text-gray-900">Laporan Transaksi</h3>
                        <p class="mt-2 text-sm text-gray-600">Unduh PDF transaksi peminjaman beserta denda.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
