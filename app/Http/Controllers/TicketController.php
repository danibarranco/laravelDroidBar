<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;

class TicketController extends Controller
{
   //metodo: get
    public function index()
    {
        $tickets = Factura::all();
        return response()->json($tickets, 200);
    }

    //metodo: post

    public function store(Request $request)
    { 	
    	$tickets=Factura::all();
    	if(!empty($tickets)){
    		foreach ($tickets as $ticket) {
	            if($request->table==$ticket->table&&$request->id_employee_finish==$ticket->id_employee_finish){
	                return response()->json(0, 400);
	            }
    		}
        }
        try{
            $ticket = Factura::create($request->all());
            return response()->json(1, 200);
        }catch(\Exception $e){
            return response()->json(0, 400);
        }
        
    }

    //metodo: get
    public function show($id)
    {
        $ticket = Factura::find($id);
        return response()->json(['data' => $ticket], 200);
    }

    //metodo: put
    
    public function update(Request $request, $id)
    {
        $ticket= Factura::find($id);
        if($ticket == null) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        try{
            $result = $ticket->update($request->all());
        }catch(\Exception $e) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        return response()->json(1, 200);
    }
    //metodo: delete
    public function destroy($id)
    {
        $result = Factura::destroy($id);
        return response()->json(true, 201);
        if($result) {
            return response()->json(true, 204);
        }
        return response()->json(['error' => 'data not deleted'], 400);
    }
}
