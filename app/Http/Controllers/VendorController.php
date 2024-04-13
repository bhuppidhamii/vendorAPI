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
            // Create a directory for the vendor if it doesn't exist
            $vendorPhone = $vendor->phone;
            // dd($vendorPhone);
            $vendorDirectory = public_path('storage/images/' . $vendorPhone . '/');
            if (!file_exists($vendorDirectory)) {
                mkdir($vendorDirectory, 0755, true);
            }
            $vendorPhotosDirectory = $vendorDirectory . 'storephotos/';
            if (!file_exists($vendorPhotosDirectory)) {
                mkdir($vendorPhotosDirectory, 0755, true);
            }

            // Iterate over each uploaded image
            $var = 1;
            foreach ($request->file('storephotos') as $image) {
                // Generate a unique filename to prevent overwriting
                $filename = $var++ . '.' . $image->getClientOriginalExtension();
                // Move the uploaded image to the vendor's directory
                $image->move($vendorPhotosDirectory, $filename);
                // Store the path to the image in the array
                $imagePaths[] = 'storage/images/' . $vendorPhone . '/storephotos/' . $filename;
            }
        }

        // Save the paths to the images in the database
        $vendor->storephotos = json_encode($imagePaths); // Store the paths as JSON


        $vendor->save();

        // Redirect to /vendor after saving
        return redirect('/vendor');
    }
}
