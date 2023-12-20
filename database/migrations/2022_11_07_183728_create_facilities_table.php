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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id')->default(0);
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->string('image')->nullable();
            $table->decimal('cost_per_block',10,2)->nullable();
            $table->smallInteger('minimum_blocks_per_booking')->default(0);
            $table->smallInteger('maximum_blocks_per_booking')->default(0);
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
        Schema::dropIfExists('facilities');
    }
};
