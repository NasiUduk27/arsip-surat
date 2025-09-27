@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Lihat Surat</h1>
            <p class="text-muted">Detail surat yang telah diarsipkan.</p>
        </div>
        <div>
            <a href="{{ route('surat.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
            <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-primary">
                <i class="fas fa-download me-2"></i> Unduh Surat
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3">
                    <strong>Nomor Surat:</strong>
                    <p>{{ $surat->nomor_surat }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Kategori:</strong>
                    <p>{{ $surat->kategori->nama_kategori }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Judul:</strong>
                    <p>{{ $surat->judul }}</p>
                </div>
                <div class="col-md-3">
                    <strong>Waktu Unggah:</strong>
                    <p>{{ $surat->created_at->format('d M Y H:i:s') }}</p>
                </div>
            </div>

            <iframe src="{{ Storage::url($surat->file_path) }}" width="100%" height="700px" class="border rounded"></iframe>
        </div>
    </div>
</div>
@endsection
