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
        Schema::create('community_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->default(0);
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('parent_category_id')->nullable();
            $table->integer('object_id')->default(0);
            $table->integer('moderation')->default(0);
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
        Schema::dropIfExists('community_categories');
    }
};
