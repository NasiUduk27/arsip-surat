@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h1 class="h3 mb-1 text-gray-800">Arsip Surat</h1>
        <p class="text-muted">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6 mb-2">
                    <a href="{{ route('surat.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Arsipkan Surat..
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('surat.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul surat..." value="{{ request('search') }}">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table modern-table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Waktu Pengarsipan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surats as $surat)
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->kategori->nama_kategori }}</td>
                            <td>{{ $surat->judul }}</td>
                            <td>{{ $surat->created_at->format('d M Y H:i:s') }}</td>
                            <td>
                                <form id="delete-form-{{ $surat->id }}" action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Apakah Anda yakin?')) { this.form.submit(); }">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data surat yang ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $surats->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
