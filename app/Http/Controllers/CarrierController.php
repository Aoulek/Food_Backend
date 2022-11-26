<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
    public function listCarrier(){
        return response()->json(Carrier::all(), 200);
    }

    public function getCarrier($id){
        $carrier = Carrier::find($id);
        if(is_null($carrier))
            return response()->json(['message'=>'Carrier Not Found'], 404);
        else
            return response()->json($carrier, 200);
    }

    public function addCarrier(Request $request){
        $carrier = Carrier::create($request->all());
        return response()->json($carrier, 200);
    }

    public function updateCarrier(Request $request, $id){
        $carrier = Carrier::find($id);
        if(is_null($carrier))
            return response()->json(['message'=>'Carrier Not Found'], 404);
        else{
            $carrier->update($request->all());
            return response()->json($carrier, 200);
        }
    }

    public function deleteCarrier($id){
        $carrier = Carrier::find($id);
        if(is_null($carrier))
            return response()->json(['message'=>'Carrier Not Found'], 404);
        else{
            $carrier->delete();
            return response()->json(null, 204);
        }
    }
}