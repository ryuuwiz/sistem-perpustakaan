<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Denda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Informasi Denda') }}</h1>
                        <p class="mt-2 text-sm text-gray-700">Nominal denda yang digunakan pada peminjaman.</p>
                    </div>
                    <a href="{{ route('denda.index') }}"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('Back') }}
                    </a>
                </div>

                <dl class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Nominal</dt>
                        <dd class="mt-1 text-2xl font-semibold text-gray-900">Rp {{ number_format($denda->nominal, 2, ',', '.') }}</dd>
                    </div>
                    <div class="rounded-lg border border-gray-200 p-4">
                        <dt class="text-sm font-medium text-gray-500">Digunakan Dalam</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $denda->peminjaman()->count() }} transaksi</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
