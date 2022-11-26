<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function listAddress(){
        return response()->json(Address::all(), 200);
    }

    public function getAddress($id){
        $address = Address::find($id);
        if(is_null($address))
            return response()->json(['message'=>'Address Not Found'], 404);
        else
            return response()->json($address, 200);
    }

    public function addAddress(Request $request){
        $address = Address::create($request->all());
        return response()->json($address, 200);
    }

    public function updateAddress(Request $request, $id){
        $address = Address::find($id);
        if(is_null($address))
            return response()->json(['message'=>'Address Not Found'], 404);
        else{
            $address->update($request->all());
            return response()->json($address, 200);
        }
    }

    public function deleteAddress($id){
        $address = Address::find($id);
        if(is_null($address))
            return response()->json(['message'=>'Address Not Found'], 404);
        else{
            $address->delete();
            return response()->json(null, 204);
        }
    }
}