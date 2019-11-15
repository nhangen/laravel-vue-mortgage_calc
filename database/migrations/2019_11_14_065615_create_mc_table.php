<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('uuid');
            $table->string('principal', 25);
            $table->double('apr', 4, 2);
            $table->integer('term');
            $table->double('payment', 25, 2);
            $table->string('ip_address', 25);
            $table->string('session_id', 100);
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
        Schema::dropIfExists('mc_values');
    }
}
