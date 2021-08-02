<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_itens', function (Blueprint $table) {
            $table->foreignId('master_id');
            $table->foreignId('link_id');
            $table->foreign('master_id')->references('id')->on('links');
            $table->foreign('link_id')->references('id')->on('links');
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('link_itens');
    }
}
