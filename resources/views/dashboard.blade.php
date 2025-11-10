<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <p class="text-base font-medium">{{ __("Welcome!") }}</p> --}}

                    @php
                    $statCards = [
                    [
                    'label' => 'Total Anggota',
                    'value' => number_format($stats['anggota'] ?? 0),
                    'description' => 'Peminjam terdaftar',
                    ],
                    [
                    'label' => 'Total Buku',
                    'value' => number_format($stats['buku'] ?? 0),
                    'description' => 'Koleksi tersedia',
                    ],
                    [
                    'label' => 'Total Peminjaman',
                    'value' => number_format($stats['peminjaman'] ?? 0),
                    'description' => 'Transaksi tercatat',
                    ],
                    [
                    'label' => 'Total User',
                    'value' => number_format($stats['users'] ?? 0),
                    'description' => 'Pengguna sistem',
                    ],
                    ];
                    @endphp

                    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($statCards as $card)
                        <div class="rounded-lg border border-gray-100 bg-white p-4 shadow-sm">
                            <p class="text-sm font-medium text-gray-500">{{ __($card['label']) }}</p>
                            <p class="mt-2 text-3xl font-bold text-gray-900">{{ $card['value'] }}</p>
                            <p class="mt-1 text-xs uppercase tracking-wide text-gray-400">{{ __($card['description']) }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>