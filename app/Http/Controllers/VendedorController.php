<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{
    public function index()
    {
        $Vendedor = Vendedor::all();
        return response()->json([
            'status' => true,
            'message' => 'Vendedor retrieved successfully',
            'data' => $Vendedor
        ], 200);
    }

    public function show($id)
    {
        $Vendedor = Vendedor::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vendedor found successfully',
            'data' => $Vendedor
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Vendedor = Vendedor::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vendedor created successfully',
            'data' => $Vendedor
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'. $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Vendedor = Vendedor::findOrFail($id);
        $Vendedor->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vendedor updated successfully',
            'data' => $Vendedor
        ], 200);
    }

    public function destroy($id)
    {
        $Vendedor = Vendedor::findOrFail($id);
        $Vendedor->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Vendedor deleted successfully'
        ], 204);
    }
}