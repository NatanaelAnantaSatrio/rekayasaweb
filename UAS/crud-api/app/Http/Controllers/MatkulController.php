<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        return Matkul::all();
    }

    public function show($id)
    {
        return Matkul::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:matkuls,kode',
            'nama' => 'required',
            'sks' => 'required|integer',
        ]);
        return Matkul::create($data);
    }

    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);
        $data = $request->validate([
            'kode' => 'sometimes|required|unique:matkuls,kode,'.$id,
            'nama' => 'sometimes|required',
            'sks' => 'sometimes|required|integer',
        ]);
        $matkul->update($data);
        return $matkul;
    }

    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();
        return response()->json(['message' => 'Matkul deleted']);
    }
}