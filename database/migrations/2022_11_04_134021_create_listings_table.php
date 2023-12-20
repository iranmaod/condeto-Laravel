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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('address', 255);
            $table->string('type');
            $table->integer('id_no')->unsigned()->nullable();
            $table->string('url', 255)->nullable();
            $table->string('apartment')->nullable()->default(null);
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode')->unsigned();
            $table->string('neighborhood')->nullable();
            $table->integer('price')->unsigned();
            $table->float('bedrooms')->nullable();
            $table->float('bathrooms')->nullable();
            $table->integer('square_feet')->unsigned()->nullable();
            $table->tinyInteger('on_aptapply')->default(0);
            $table->text('description')->nullable();
            $table->boolean('dishwasher')->default(false);
            $table->boolean('fireplace')->default(false);
            $table->boolean('furnished')->default(false);
            $table->boolean('loft')->default(false);
            $table->boolean('washer_dryer')->default(false);
            $table->boolean('doorman')->default(false);
            $table->boolean('gym')->default(false);
            $table->boolean('elevator')->default(false);
            $table->boolean('laundry')->default(false);
            $table->boolean('pets')->default(false);
            $table->boolean('pool')->default(false);
            $table->boolean('garage')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('boosted')->default(false);
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
        Schema::dropIfExists('listings');
    }
};
