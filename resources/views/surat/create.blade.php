@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="mb-4">
            <h1 class="h3 mb-1 text-gray-800">Arsipkan Surat</h1>
            <p class="text-muted">
                Unggah surat yang telah terbit pada form ini untuk diarsipkan. Pastikan file dalam format PDF.
            </p>
        </div>

        <div class="card shadow-sm" style="max-width: 600px;">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                            id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                        @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori_id" name="kategori_id" required>
                            <option value="" selected disabled>Pilih Kategori...</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File Surat (PDF)</label>
                        <input class="form-control" type="file" id="file" name="file" accept=".pdf" required>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('surat.index') }}" class="btn btn-light">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
