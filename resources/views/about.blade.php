@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="card" style="width: 18rem; margin: auto;">
       <img src="{{ asset('images/profile.jpg') }}" class="card-img-top" alt="Foto Profil">
        <div class="card-body">
            <h5 class="card-title">Aplikasi Ini Dibuat Oleh:</h5>
            <p class="card-text">
                <strong>Nama:</strong> Dhoriffito Diansyah Putra<br>
                <strong>NIM:</strong> 2141720201
            </p>
            <p class="card-text"><small class="text-muted">Tanggal Pembuatan: {{ date('d F Y') }}</small></p>
        </div>
    </div>
</div>
@endsection
