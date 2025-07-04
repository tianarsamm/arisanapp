@extends('layouts.app')

@section('content')
    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <h2 class="font-bold text-2xl text-center text-blue-700 mb-6">
                    Grup Arisan yang Kamu Ikuti
                </h2>

                @if($memberships->isEmpty())
                    <p class="text-gray-600 text-center">Kamu belum bergabung dalam grup arisan manapun.</p>
                @else
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Nama Grup</th>
                                <th class="px-4 py-2 border">Tanggal Gabung</th>
                                <th class="px-4 py-2 border">Jumlah Putaran</th>
                                <th class="px-4 py-2 border">Iuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($memberships as $member)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $member->group->name ?? '-' }}</td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($member->join_date)->format('d M Y') }}</td>
                                    <td class="border px-4 py-2">{{ $member->group?->total_rounds ?? '-' }}</td>
                                    <td class="border px-4 py-2">Rp {{ number_format($member->group?->monthly_fee ?? 0) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
@endsection
