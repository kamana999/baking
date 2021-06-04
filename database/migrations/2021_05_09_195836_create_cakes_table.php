<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->enum('weight_type',['pound','kg'])->default('pound');
            $table->float('weight')->nullable();
            $table->integer('layer')->default(1);
            $table->integer('unit')->default(1);
            $table->string('shape')->nullable();
            $table->string('flavour')->nullable();
            $table->string('serve')->nullable();
            $table->enum('delivired',['today','tommorow','pre_booking'])->default('today');
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
        Schema::dropIfExists('cakes');
    }
}
