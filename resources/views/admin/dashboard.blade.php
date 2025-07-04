@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow-md rounded-xl p-6">
            <h4 class="text-sm text-gray-500">Total Grup Arisan</h4>
            <p class="text-2xl font-bold text-indigo-600">{{ $groupCount }}</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6">
            <h4 class="text-sm text-gray-500">Total Anggota</h4>
            <p class="text-2xl font-bold text-indigo-600">{{ $memberCount }}</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6">
            <h4 class="text-sm text-gray-500">Total Pembayaran Masuk</h4>
            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalPayments, 0, ',', '.') }}</p>
        </div>

        <div class="bg-white shadow-md rounded-xl p-6">
            <h4 class="text-sm text-gray-500">Total Pemenang</h4>
            <p class="text-2xl font-bold text-red-600">{{ $winnerCount }}</p>
        </div>
    </div>
</div>
@endsection
