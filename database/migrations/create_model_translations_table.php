<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('model_translations', function (Blueprint $table) {
            $table->string('translatable_type');
            $table->unsignedBigInteger('translatable_id');
            $table->unsignedBigInteger('translation_id');
        });
    }
};
