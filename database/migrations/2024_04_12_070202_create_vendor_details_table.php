<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->string('id')->primary(); // Change the type to string and make it primary
            $table->string('name', 50)->nullable(); // nullable since it will be auto-generated
            $table->string('phone', 15);
            $table->string('email', 100);
            $table->string('store_name', 100);
            $table->string('address', 300);
            $table->string('gstin', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_details');
    }
}
