<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tablausuarios', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->bigInteger('idusuario')->unsigned();
            $table->string('DNI');
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('numcuenta');
            $table->timestamps();
            $table->foreign('idusuario')->references('id')->on('tablageneral')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('table');
    }
};
