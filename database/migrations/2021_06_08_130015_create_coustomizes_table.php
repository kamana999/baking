<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoustomizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coustomizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->boolean('ordered')->default(false);
            $table->string('name');
            $table->string('contact');
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->text('description');
            $table->enum('weight_type',['pound','kg'])->default('pound');
            $table->float('weight')->nullable();
            $table->string('shape')->nullable();
            $table->string('flavour')->nullable();
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
        Schema::dropIfExists('coustomizes');
    }
}
