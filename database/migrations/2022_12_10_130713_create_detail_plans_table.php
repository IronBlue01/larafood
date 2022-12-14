<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('details_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');

            $table->foreign('plan_id')
                                ->references('id')
                                ->on('plans')
                                ->onDelete('cascade');

            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('details_plan');
    }
};
