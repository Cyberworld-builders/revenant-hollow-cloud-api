<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHauntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haunts', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->longText('description')->nullable();
          $table->string('status')->default('idle');
          $table->decimal('latitude', 10, 7)->nullable();
          $table->decimal('longitude', 10, 7)->nullable();
          $table->decimal('altitude', 10, 7)->nullable();
          $table->boolean('idle')->default(true);
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
        Schema::dropIfExists('haunts');
    }
}
