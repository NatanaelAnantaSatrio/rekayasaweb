<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    public function index()
    {
        return response()->json(Matkul::all());
    }

    public function show($id)
    {
        $matkul = Matkul::findOrFail($id);
        return response()->json($matkul);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required|unique:matkuls,kode',
            'nama' => 'required',
            'sks' => 'required|integer',
        ]);

        $matkul = Matkul::create($request->all());
        return response()->json($matkul, 201);
    }

    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);

        $this->validate($request, [
            'kode' => 'sometimes|required|unique:matkuls,kode,'.$id,
            'nama' => 'sometimes|required',
            'sks' => 'sometimes|required|integer',
        ]);

        $matkul->update($request->all());
        return response()->json($matkul);
    }

    public function destroy($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();
        return response()->json(['message' => 'Matkul deleted successfully']);
    }
}