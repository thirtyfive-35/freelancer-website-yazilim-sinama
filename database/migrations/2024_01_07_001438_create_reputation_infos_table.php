<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReputationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reputation_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('reputation_title'); // Değişiklik burada
            $table->string('target_username');
            $table->string('reputation_price');
            $table->string('delivery_date'); // Değişiklik burada
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
        Schema::dropIfExists('reputation_infos');
    }
}
//php artisan make:migration create_reputation_infos_table