@extends('layouts.app')

@section('content')
    <div class="py-8 min-h-screen bg-gradient-to-br from-blue-100 to-white">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-md shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Pencarian & Jumlah Grup --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4">
                <form action="{{ route('arisan.index') }}" method="GET" class="w-full sm:w-auto">
                    <input type="text" name="search" placeholder="Cari nama grup..."
                        class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 w-full sm:w-auto"
                        value="{{ request('search') }}">
                    <button type="submit"
                        class="mt-2 sm:mt-0 sm:ml-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                        Cari
                    </button>
                </form>
                <div class="text-gray-700">
                    Total Grup: <span class="font-bold">{{ $groups->count() }}</span>
                </div>
            </div>

            {{-- Tabel Data --}}
            <div class="bg-white shadow-xl sm:rounded-lg p-6 overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-100 text-left text-gray-700">
                            <th class="px-4 py-2 border">Nama Grup</th>
                            <th class="px-4 py-2 border">Putaran</th>
                            <th class="px-4 py-2 border">Iuran</th>
                            <th class="px-4 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($groups as $group)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $group->name }}</td>
                                <td class="border px-4 py-2">{{ $group->total_rounds }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($group->monthly_fee, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <form method="POST" action="{{ route('arisan.join', $group->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded">
                                            Gabung
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-white py-4">
                                    Belum ada grup arisan yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
