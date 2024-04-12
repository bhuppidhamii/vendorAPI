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
    ];

    // Define a boot method to handle model events
    protected static function boot()
    {
        parent::boot();

        // Listen for the 'creating' event
        static::creating(function ($vendor) {
            // Generate the vendor id based on the count of existing vendors
            $vendorCount = static::count() + 1;
            $vendor->id = 'Vendor' . $vendorCount;
        });
    }

    // Set the primary key column
    protected $primaryKey = 'id';

    // Disable auto-incrementing for the primary key
    public $incrementing = false;
}
