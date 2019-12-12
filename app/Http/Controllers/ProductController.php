<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductController extends Controller
{

    //metodo: get
    public function index()
    
    {
        $products =  Producto::all();
        return response()->json($products, 200);
    }

    //metodo: post

    public function store(Request $request)
    {
        $product = Producto::create($request->all());
        return response()->json( $product->$id, 200);
    }

    //metodo: get
    public function show($id)
    {
        $product = Producto::find($id);
        return response()->json(['data' => $product], 200);
    }

    //metodo: put
    
    public function update(Request $request, $id)
    {
        $product= Producto::find($id);
        if($product == null) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        try{
            $result = $product->update($request->all());
        }catch(\Exception $e) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        return response()->json(['data' => $result], 200);
    }
    //metodo: delete
    public function destroy($id)
    {
        $result = Producto::destroy($id);
        return response()->json(['data' => $result], 201);
        if($result) {
            return response()->json([], 204);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }
}
