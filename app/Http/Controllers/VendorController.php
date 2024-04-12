<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor_details;

class VendorController extends Controller
{
    public function index(){
        return view('signup');
    }

    public function store(Request $request){
        echo '<pre>';
        print_r($request->all());

        $vendor=new Vendor_details();

        $vendor->id=$request['id'];
        $vendor->name=$request['name'];
        $vendor->phone=$request['phone'];
        $vendor->email=$request['email'];
        $vendor->store_name=$request['store_name'];
        $vendor->address=$request['address'];
        $vendor->gstin=$request['gstin'];

        $vendor->save();

        // Redirect to /vendor after saving
        return redirect('/vendor');
    }
}
