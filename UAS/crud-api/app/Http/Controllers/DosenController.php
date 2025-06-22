<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        return response()->json(Dosen::all());
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return response()->json($dosen);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nidn' => 'required|unique:dosens,nidn',
            'email' => 'required|email|unique:dosens,email',
            'prodi' => 'required',
        ]);

        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $this->validate($request, [
            'nama' => 'sometimes|required',
            'nidn' => 'sometimes|required|unique:dosens,nidn,'.$id,
            'email' => 'sometimes|required|email|unique:dosens,email,'.$id,
            'prodi' => 'sometimes|required',
        ]);

        $dosen->update($request->all());
        return response()->json($dosen);
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}