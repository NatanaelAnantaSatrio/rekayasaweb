<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return response()->json(Dosen::all());
    }

    public function show($id)
    {
        $data = Dosen::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'fakultas' => 'required',
            'matkul' => 'required',
        ]);
        $data = Dosen::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Dosen::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Dosen::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }
}