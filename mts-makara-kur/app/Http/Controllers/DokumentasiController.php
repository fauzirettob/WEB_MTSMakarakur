<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /** Daftar foto (publik, untuk halaman website). */
    public function index()
    {
        return response()->json(
            DokumentasiFoto::query()
                ->latest('id')
                ->get()
                ->map(fn (DokumentasiFoto $f) => [
                    'id' => $f->id,
                    'src' => $f->url,
                    'caption' => $f->caption ?? '',
                    'createdAt' => $f->created_at?->timestamp ?? null,
                    'dateLabel' => $f->uploaded_at,
                ])
        );
    }

    /** Halaman admin: kelola foto. */
    public function adminIndex()
    {
        $fotos = DokumentasiFoto::query()->latest('id')->get();
        return view('admin.fotos', compact('fotos'));
    }

    /** Unggah foto (admin). */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'caption' => ['nullable', 'string', 'max:200'],
        ]);

        $file = $request->file('foto')->store('dokumentasi', 'public');

        $foto = DokumentasiFoto::create([
            'file' => basename($file),
            'caption' => $request->input('caption'),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'id' => $foto->id,
                'src' => $foto->url,
                'caption' => $foto->caption ?? '',
                'createdAt' => $foto->created_at?->timestamp ?? null,
                'dateLabel' => $foto->uploaded_at,
            ], 201);
        }

        return redirect()->route('admin.fotos')->with('success', 'Foto berhasil diunggah.');
    }

    /** Hapus foto (admin). */
    public function destroy(DokumentasiFoto $foto)
    {
        Storage::disk('public')->delete('dokumentasi/' . $foto->file);
        $foto->delete();

        return response()->json(['ok' => true]);
    }
}
