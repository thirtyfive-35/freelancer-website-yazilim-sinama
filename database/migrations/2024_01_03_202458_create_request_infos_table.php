<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('price');
            $table->string('hizmet_title'); // Değişiklik burada
            $table->string('delivery_date'); // Değişiklik burada
            $table->string('hizmet_describe'); // Değişiklik burada
            #$table->string('freelancer_keywords');
            $table->string('hizmet_not');
            $table->string('hizmet_sistem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_infos');
    }
}