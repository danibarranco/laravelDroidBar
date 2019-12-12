<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comanda;

class CommandController extends Controller
{
    //metodo: get
    public function index()
    
    {
        $commands =  Comanda::all();
        return response()->json($commands, 200);
    }

    //metodo: post

    public function store(Request $request)
    {
        $command = Comanda::create($request->all());
        return response()->json($command->$id, 200);
    }

    //metodo: get
    public function show($id)
    {
        $command = Comanda::find($id);
        return response()->json(['data' => $command], 200);
    }

    //metodo: put
    
    public function update(Request $request, $id)
    {
        $command= Comanda::find($id);
        if($command == null) {
            return response()->json(0, 400);
        }
        try{
        	if($command->served==1){
        		$result =0;		
        	}else{
        		$result = $command->update($request->all());
        	}
        }catch(\Exception $e) {
            return response()->json(0, 400);
        }
        return response()->json(1, 200);
    }
    //metodo: delete
    public function destroy($id)
    {
    	$command=Comanda::find($id);
    	if($command->served==1){
    		return response()->json(0, 400);
    	}else{
			Comanda::destroy($id);
        	return response()->json(1, 200);
    	}
    }
    
    
    public function served($id)
    {
        $command= Comanda::find($id);
        if($command == null) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        try{
            $command->served=1;
            $command->save();
        }catch(\Exception $e) {
            return response()->json(['error' => 'data not updated'], 400);
        }
        return back();
    }
    
}

 

