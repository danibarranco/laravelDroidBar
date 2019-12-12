<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
class EmployeeController extends Controller
{
   //metodo: get
    public function index()
    
    {
        $employees =  Empleado::all();
        return response()->json($employees, 200);
    }

    //metodo: post

    public function store(Request $request)
    {
        $employee = Empleado::create($request->all());
        return response()->json(['data' => $employee->$id], 200);
    }

    //metodo: get
    public function show($id)
    {
        $employee = Empleado::find($id);
        return response()->json(['data' => $employee], 200);
    }

    //metodo: put
    
    public function update(Request $request, $id)
    {
        $employee= Empleado::find($id);
        if($employee == null) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        try{
            $result = $employee->update($request->all());
        }catch(\Exception $e) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        return response()->json(['data' => $result], 200);
    }
    //metodo: delete
    public function destroy($id)
    {
        $result = Empleado::destroy($id);
        return response()->json(['data' => $result], 201);
        if($result) {
            return response()->json([], 204);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }
}
