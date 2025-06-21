<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        return response()->json(Matkul::all());
    }

    public function show($id)
    {
        $data = Matkul::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'sks' => 'required',
        ]);
        $data = Matkul::create($request->all());
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Matkul::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = Matkul::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not found'], 404);
        }
        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }
}