<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arisan_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_rounds');
            $table->decimal('monthly_fee', 10, 2);
            $table->enum('status', ['open', 'running', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arisan_groups');
    }
};
