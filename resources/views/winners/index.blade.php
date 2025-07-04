@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">🎉 Undian Pemenang Arisan 🎉</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4 border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    @foreach($groups as $group)
        <div class="bg-white shadow-md rounded-lg p-6 mb-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold text-gray-800">{{ $group->name }}</h4>
                <form action="{{ route('winners.undi', $group->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow">
                        🔁 Undi Pemenang
                    </button>
                </form>
            </div>

            @if($group->winners->count())
                <div class="bg-gray-50 border border-gray-200 rounded p-4">
                    <h5 class="font-medium text-gray-700 mb-2">🏆 Daftar Pemenang:</h5>
                    <ul class="list-disc pl-5 text-gray-700 space-y-1">
                        @foreach($group->winners as $winner)
                            <li>
                                <span class="font-semibold">Putaran {{ $winner->round_number }}:</span>
                                {{ $winner->member->user->name ?? 'N/A' }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="text-sm text-gray-500 italic">Belum ada pemenang yang diundi.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
