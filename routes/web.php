<?php

use Illuminate\Support\Facades\Route;
use App\Models\Vendor_details;
use App\Http\Controllers\VendorController;


Route::get('/', function () {
    return redirect('/vendor');
});


Route::get('/vendor', [VendorController::class,'index']);
Route::post('/vendor', [VendorController::class,'store']);
 

Route::get('/allvendors',function(){
    $vendors=Vendor_details::all(); 
    echo'<pre>';
    print_r($vendors->toArray());
});
