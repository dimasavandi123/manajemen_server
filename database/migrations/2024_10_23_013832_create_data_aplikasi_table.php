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
        Schema::create('data_aplikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_vm_id');
            $table->foreign('data_vm_id')->references('id')->on('data_vm');
            $table->string('nama_aplikasi');
            $table->string('nama_opd');
            $table->string('url_aplikasi');
            $table->string('pass_aplikasi');
            $table->string('versi_php');
            $table->string('keterangan_pic');
            $table->integer('port_aplikasi');
            $table->enum('status',['Aktif','Nonaktif']);
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
        Schema::dropIfExists('data_aplikasi');
    }
};
