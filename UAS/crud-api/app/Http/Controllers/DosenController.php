<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return Dosen::all();
    }

    public function show($id)
    {
        return Dosen::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosens,nidn',
            'email' => 'required|email|unique:dosens,email',
            'prodi' => 'required',
        ]);
        return Dosen::create($data);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $data = $request->validate([
            'nama' => 'sometimes|required',
            'nidn' => 'sometimes|required|unique:dosens,nidn,'.$id,
            'email' => 'sometimes|required|email|unique:dosens,email,'.$id,
            'prodi' => 'sometimes|required',
        ]);
        $dosen->update($data);
        return $dosen;
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return response()->json(['message' => 'Dosen deleted']);
    }
}