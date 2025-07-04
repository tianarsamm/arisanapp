<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arisan_group_id')->constrained('arisan_groups')->onDelete('cascade');
            $table->foreignId('arisan_member_id')->constrained('arisan_members')->onDelete('cascade');
            $table->integer('round');
            $table->date('draw_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
