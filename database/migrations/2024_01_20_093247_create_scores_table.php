<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->decimal('scores',1,1);
            $table->unsignedBigInteger('student_id',);
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBigInteger('subject_id',);
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
