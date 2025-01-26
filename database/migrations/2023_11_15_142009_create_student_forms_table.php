<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('student_forms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("roll_number"); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('student_forms');
    }
};
