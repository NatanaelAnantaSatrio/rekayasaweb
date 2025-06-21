<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return Mahasiswa::all();
    }

    public function show($id)
    {
        return Mahasiswa::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim',
            'jurusan' => 'required',
        ]);
        return Mahasiswa::create($data);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $data = $request->validate([
            'nama' => 'sometimes|required',
            'nim' => 'sometimes|required|unique:mahasiswas,nim,'.$id,
            'jurusan' => 'sometimes|required',
        ]);
        $mahasiswa->update($data);
        return $mahasiswa;
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa deleted']);
    }
}