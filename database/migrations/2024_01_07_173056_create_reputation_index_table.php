<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReputationIndexTable extends Migration
{
    public function up()
    {
        Schema::create('reputation_indices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_user_id')->constrained('users'); 
            $table->foreignId('target_user_id')->constrained('users'); 
            $table->string('target_and_client_username');
            $table->decimal('limit_price', 8, 2); // Örnek bir sayı formatı, gerektiğinde değiştirilebilir
            // Diğer sütunları ekleyin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reputation_indices');
    }
}


