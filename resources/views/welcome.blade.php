@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('image/bg_koperasi.svg') }}"
            alt="Background" class="w-full h-full object-cover opacity-50 blur-sm">
        </div>

        <div class="relative z-10 text-center  max-w-2xl">
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4 drop-shadow-lg">Selamat Datang di Aplikasi Arisan Digital!</h1>
            <p class="text-lg text-white mb-6 drop-shadow">Kelola arisan Anda dengan mudah dan efisien. Gabung sekarang dan mulai pengalaman digital yang menyenangkan!</p>
            <a href="{{ route('arisan.index') }}"
                class="shadow-lg inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition">
                Lihat Daftar Grup Arisan
            </a>
        </div>
    </div>
@endsection
