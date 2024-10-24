<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_vm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('server_data_id');
            $table->foreign('server_data_id')->references('id')->on('server_data');
            $table->string('nama_vm');
            $table->string('os_vm');
            $table->string('ip_public_vm')->unique();
            $table->string('ip_local_vm')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('data_vm');
    }
};
