<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministers', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('position');
            $table->string('category');
            $table->string('minister_image')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('ministers');
    }
}
