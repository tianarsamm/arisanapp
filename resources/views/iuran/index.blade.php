@extends('layouts.app')
    @section('content')
    
    <div class="py-8 max-w-4xl mx-auto">
        <h2 class="font-bold text-2xl text-white leading-tight text-center mb-4">Pembayaran Iuran</h2>
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">{{ session('success') }}</div>
        @endif

        @foreach ($memberships as $member)
            <div class="mb-6 border p-4 rounded shadow">
                <h3 class="text-lg font-semibold text-white">{{ $member->group->name }}</h3>

                <form action="{{ route('iuran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="arisan_member_id" value="{{ $member->id }}">

                    <div class="grid grid-cols-3 gap-4 mt-3">
                        <input type="number" name="month" placeholder="Bulan (1-12)" class="border p-2" required>
                        <input type="number" name="year" placeholder="Tahun" class="border p-2" required>
                        <input type="number" name="amount" placeholder="Jumlah (Rp)" class="border p-2" required>
                    </div>

                    <div class="mt-3">
                        <input type="file" name="proof" class="border p-2">
                    </div>

                    <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">
                        Bayar
                    </button>
                </form>
            </div>
        @endforeach
    </div>
 @endsection
