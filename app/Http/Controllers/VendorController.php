<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor_details;

class VendorController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        echo '<pre>';
        print_r($request->all());

        $vendor = new Vendor_details();

        $vendor->id = $request['id'];
        $vendor->name = $request['name'];
        $vendor->phone = $request['phone'];
        $vendor->email = $request['email'];
        $vendor->store_name = $request['store_name'];
        $vendor->address = $request['address'];
        $vendor->gstin = $request['gstin'];

        // Process and store the uploaded images
        $imagePaths = [];
        if ($request->hasFile('storephotos')) {
            foreach ($request->file('storephotos') as $image) {
                // Generate a unique filename to prevent overwriting
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the uploaded image to the storage directory
                $image->move(public_path('storage/images'), $filename);
                // Store the path to the image in the array
                $imagePaths[] = 'storage/images/' . $filename;
            }
        }

        // Save the paths to the images in the database
        $vendor->storephotos = json_encode($imagePaths); // Store the paths as JSON


        $vendor->save();

        // Redirect to /vendor after saving
        return redirect('/vendor');
    }
}
