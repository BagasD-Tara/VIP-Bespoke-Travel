<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * READ: Menampilkan daftar semua program dari database
     */
    public function index()
    {
        $programs = Program::orderBy('id', 'asc')->get();
        return view('programs.index', compact('programs'));
    }

    /**
     * CREATE: Menampilkan form tambah program
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * CREATE: Menyimpan data program baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Program::create($validated);

        return redirect()->route('programs.index')->with('success', 'Program baru berhasil disimpan ke database!');
    }

    /**
     * READ: Menampilkan detail satu program
     */
    public function show(string $id)
    {
        $program = Program::findOrFail($id);
        return view('programs.show', compact('program'));
    }

    /**
     * UPDATE: Menampilkan form edit program
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * UPDATE: Menyimpan perubahan data program ke database
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $program = Program::findOrFail($id);
        $program->update($validated);

        return redirect()->route('programs.index')->with('success', 'Data program berhasil diperbarui!');
    }

    /**
     * DELETE: Menghapus program dari database
     */
    public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program berhasil dihapus dari database!');
    }
}
