<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('request_infos'); // request_infos tablosundaki ID ile eşleşen foreign key
            $table->foreignId('user_id')->constrained('users'); // users tablosundaki ID ile eşleşen foreign key
            $table->decimal('offer_price', 10, 2);
            $table->boolean('active')->default(true); // Aktif durumu varsayılan olarak true olarak ayarla
            $table->boolean('order_status')->default(false);
            $table->boolean('delivery_status')->default(false);
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
        Schema::dropIfExists('offers');
    }
}


