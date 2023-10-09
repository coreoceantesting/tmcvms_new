<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassValiditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pass_validities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('no_of_days');
            $table->text('description')->nullable(); // Use 'text' for longer descriptions
            $table->boolean('is_delete')->default(false); // Assuming is_delete is a boolean field
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
        Schema::dropIfExists('pass_validities');
    }
}
