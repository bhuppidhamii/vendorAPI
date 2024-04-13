<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'store_name',
        'address',
        'gstin',
        'storephotos'
    ];

    // Define a boot method to handle model events
    protected static function boot()
    {
        parent::boot();

        // Listen for the 'creating' event
        static::creating(function ($vendor) {
            $vendorCount = static::count() + 1;
            $vendor->id = 'Vendor' . $vendorCount;
        });

         // Listen for the 'saving' event
         static::saving(function ($vendor) {
            // Ensure the folder structure exists before saving the image
            $destinationPath = public_path($vendor->id . '/storephotos/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
        });
    }

    // Set the primary key column
    protected $primaryKey = 'id';

    // Disable auto-incrementing for the primary key
    public $incrementing = false;
}
