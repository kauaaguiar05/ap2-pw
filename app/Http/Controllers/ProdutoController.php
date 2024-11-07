<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProdutoController extends Controller
{
    public function index()
    {
        $Produto = Produto::all();
        return response()->json([
            'status' => true,
            'message' => 'Produto retrieved successfully',
            'data' => $Produto
        ], 200);
    }

    public function show($id)
    {
        $Produto = Produto::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Produto found successfully',
            'data' => $Produto
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
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

        $Produto = Produto::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Produto created successfully',
            'data' => $Produto
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
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

        $Produto = Produto::findOrFail($id);
        $Produto->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Produto updated successfully',
            'data' => $Produto
        ], 200);
    }

    public function destroy($id)
    {
        $Produto = Produto::findOrFail($id);
        $Produto->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Produto deleted successfully'
        ], 204);
    }
}
