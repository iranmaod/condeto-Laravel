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
        Schema::create('property_users', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->integer('user_id')->nullable();
            $table->string('role')->nullable();
            $table->string('role_type')->nullable();
            $table->integer('agent_id')->nullable();
            $table->tinyInteger('is_admin')->default(0)->nullable();
            $table->tinyInteger('is_super_admin')->default(0)->nullable();
            $table->integer('brokerage_id')->nullable();
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
        Schema::dropIfExists('property_users');
    }
};
