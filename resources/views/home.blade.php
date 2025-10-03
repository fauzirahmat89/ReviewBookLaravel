@extends('layouts.master')

@section('judul')
    SanberBook

@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <h2>Koleksi Buku Santai Berkualitas</h2>
    <p>Membaca dan Berbagi agar hidup ini semakin santai berkualitas</p>

    <h3>Manfaat Membaca Buku</h3>
    <ul>
        <li>Menambah wawasan dan pengetahuan baru</li>
        <li>Memberikan inspirasi dan motivasi hidup</li>
        <li>Melatih konsentrasi dan imajinasi</li>
    </ul>

    <h3>Cara Mendapatkan Buku di Perpustakaan Kami</h3>
    <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="/register">Form Sign Up</a></li>
        <li>Pilih buku yang ingin dipinjam atau dibaca</li>
        <li>Selesai!</li>
    </ol>

    @auth
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body text-center p-5">
                <h2 class="fw-bold mb-3">🎉 Selamat Datang, {{ Auth()->user()->name }}!</h2>
                <p class="text-muted">Senang melihatmu kembali di platform kami.</p>

                <div class="d-flex justify-content-center gap-4 mt-4">
                    <div class="p-3 bg-light rounded-3 shadow-sm">
                        <h5 class="mb-1">👤 Role</h5>
                        <span class="badge bg-primary fs-6">{{ Auth()->user()->role }}</span>
                    </div>

                    @if (Auth()->user()->profile)
                    <div class="p-3 bg-light rounded-3 shadow-sm">
                        <h5 class="mb-1">🎂 Umur</h5>
                        <span class="badge bg-success fs-6">{{ Auth()->user()->profile->age }} Tahun</span>
                    </div>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ url('/profile') }}" class="btn btn-lg btn-primary rounded-pill px-4 shadow-sm">
                        Lihat Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endauth

@endsection