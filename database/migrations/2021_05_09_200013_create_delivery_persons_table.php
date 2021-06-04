<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('contact2')->nullable();
            $table->string('image')->nullable();
            $table->integer('aadhar_no');
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('pancard');
            $table->string('driving_license');
            $table->string('bank_passbook');
            $table->enum('vehicle',['Bike','Cycle','Ecycle']);
            $table->enum('work_time',['Part Time','Full Time']);
            $table->boolean('outForDelivery')->nullable()->default(false);
            $table->boolean('orderCompleted')->nullable()->default(false);
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('delivery_persons');
    }
}
