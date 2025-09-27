<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = Surat::with('kategori');

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $surats = $query->latest()->paginate(10);
        return view('surat.index', compact('surats'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        if ($kategoris->isEmpty()) {
            Kategori::create(['nama_kategori' => 'Undangan']);
            Kategori::create(['nama_kategori' => 'Pengumuman']);
            Kategori::create(['nama_kategori' => 'Nota Dinas']);
            Kategori::create(['nama_kategori' => 'Pemberitahuan']);
            $kategoris = Kategori::all();
        }
        return view('surat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file'        => 'required|file|mimes:pdf|max:2048',
            'nomor_surat' => [
                'required',
                'string',
                'max:255',
                Rule::unique('surats')->where(function ($query) use ($request) {
                    return $query->where('kategori_id', $request->kategori_id);
                }),
            ],
        ]);
        $filePath = $request->file('file')->store('public/surat_pdf');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function destroy(Surat $surat)
    {
        if ($surat->file_path) {
            Storage::delete($surat->file_path);
        }

        $surat->delete();
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus!');
    }

    public function download($id)
    {
        $surat = Surat::findOrFail($id);
        return Storage::download($surat->file_path, $surat->judul . '.pdf');
    }
}
