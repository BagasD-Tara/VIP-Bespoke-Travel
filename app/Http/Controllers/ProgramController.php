<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * READ: Menampilkan daftar semua program ekspedisi
     * Mendukung Web View dan RESTful API (JSON).
     */
    public function index(Request $request)
    {
        $programs = Program::orderBy('id', 'asc')->get();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Daftar program ekspedisi berhasil diambil.',
                'total' => $programs->count(),
                'data' => $programs
            ], 200);
        }

        return view('programs.index', compact('programs'));
    }

    /**
     * FORM CREATE: Menampilkan halaman formulir inisiasi program
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * CREATE: Menyimpan program baru ke database dengan validasi
     * Validasi: nama (required, max:100), deskripsi (required)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama program wajib diisi.',
            'nama.max' => 'Nama program maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi program wajib diisi.',
        ]);

        $program = Program::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Program ekspedisi baru berhasil ditambahkan.',
                'data' => $program
            ], 201);
        }

        return redirect()->route('programs.index')->with('success', 'Program ekspedisi baru berhasil disimpan ke database!');
    }

    /**
     * READ DETAIL: Mengambil data satu program berdasarkan ID
     */
    public function show(Request $request, string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Program ekspedisi dengan ID #{$id} tidak ditemukan."
                ], 404);
            }
            abort(404, 'Program ekspedisi tidak ditemukan.');
        }

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Detail program ekspedisi berhasil diambil.',
                'data' => $program
            ], 200);
        }

        return view('programs.show', compact('program'));
    }

    /**
     * FORM EDIT: Menampilkan formulir edit program terisi data eksisting
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * UPDATE: Memperbarui data program di database dengan validasi
     * Validasi: nama (required, max:100), deskripsi (required)
     */
    public function update(Request $request, string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Program ekspedisi dengan ID #{$id} tidak ditemukan."
                ], 404);
            }
            abort(404, 'Program ekspedisi tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ], [
            'nama.required' => 'Nama program wajib diisi.',
            'nama.max' => 'Nama program maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi program wajib diisi.',
        ]);

        $program->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data program ekspedisi berhasil diperbarui.',
                'data' => $program
            ], 200);
        }

        return redirect()->route('programs.index')->with('success', 'Data program ekspedisi berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus program dari database secara permanen
     */
    public function destroy(Request $request, string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            if ($request->wantsJson() || $request->is('api/*')) {
                return response()->json([
                    'status' => 'error',
                    'message' => "Program ekspedisi dengan ID #{$id} tidak ditemukan."
                ], 404);
            }
            abort(404, 'Program ekspedisi tidak ditemukan.');
        }

        $program->delete();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'status' => 'success',
                'message' => "Program ekspedisi '{$program->nama}' berhasil dihapus dari database."
            ], 200);
        }

        return redirect()->route('programs.index')->with('success', "Program ekspedisi '{$program->nama}' berhasil dihapus dari database!");
    }
}
