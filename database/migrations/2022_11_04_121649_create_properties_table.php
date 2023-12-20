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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('type_id')->default('0');
            $table->string('name');
            $table->Integer('parent_property_id')->default('0')->nullable();
            $table->Integer('listing_id')->nullable();
            $table->Integer('brokerage_id')->nullable();
            $table->decimal('fee',10,2)->default('0')->nullable();
            $table->string('stripe_account')->nullable();
            $table->decimal('stripe_charge_percent')->default('0')->nullable();
            $table->tinyInteger('send_push')->default('1')->nullable();
            $table->tinyInteger('send_emails')->default('1')->nullable();
            $table->tinyInteger('community_on')->default('1')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
