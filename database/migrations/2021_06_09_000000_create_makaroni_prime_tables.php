<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakaroniPrimeTables extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('employee', function (Blueprint $table) {
            $table->string('personalId', 11)->primary();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->timestamp('joinDate')->useCurrent();
            $table->timestamp('leaveDate')->nullable();
            $table->string('position')->nullable();
            $table->decimal('pay')->nullable();
            $table->timestamps();
        });
        Schema::create('division', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->string('location');
            $table->boolean('isOperating')->default(true);
            $table->timestamps();
        });
        Schema::create('rawMaterial', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->decimal('price', 10);
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('minimum')->default(0);
            $table->timestamps();
        });
        Schema::create('machinery', function (Blueprint $table) {
            $table->string('serialNumber')->primary();
            $table->string('function')->nullable();
            $table->string('located');
            $table->string('model')->nullable();
            $table->boolean('isOperating')->default(true);
            $table->timestamp('lastServiced')->nullable();
            $table->boolean('needsMaintenance')->default(false);
            $table->timestamp('purchaseDate')->useCurrent();
            $table->timestamp('decommissionDate')->nullable();
            $table->timestamps();

            $table->foreign('located')->references('name')->on('division')->onDelete('cascade');
        });
        Schema::create('manager', function (Blueprint $table) {
            $table->string('employee', 11)->primary();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('employee')->references('personalId')->on('employee')->onDelete('cascade');
        });
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->timestamp('registerDate')->useCurrent();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phoneNumber')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('makarons', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->bigInteger('quantity')->default(0);
            $table->decimal('price');
            $table->string('shape');
            $table->string('color');
            $table->integer('length');
            $table->integer('popularity');
            $table->timestamps();
        });
        Schema::create('discount', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->decimal('amount', 2);
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->timestamps();
        });
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientID');
            $table->string('productName');
            $table->integer('rating');
            $table->multiLineString('comment');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();

            $table->foreign('productName')->references('name')->on('makarons')->onDelete('cascade');
        });
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientID');
            $table->timestamp('orderDate')->useCurrent();
            $table->decimal('total');
            $table->timestamps();
        });

        Schema::create('makarons_order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('makarons');
            $table->foreignId('orderID');
            $table->integer('amount');
            $table->decimal('price');

            $table->foreign('makarons')->references('name')->on('makarons')->onDelete('cascade');
        });
        Schema::create('discount_makarons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code');
            $table->string('makarons');

            $table->foreign('code')->references('code')->on('discount')->onDelete('cascade');
            $table->foreign('makarons')->references('name')->on('makarons')->onDelete('cascade');
        });
        Schema::create('division_employee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('division');
            $table->string('employee', 11);

            $table->foreign('division')->references('name')->on('division')->onDelete('cascade');
            $table->foreign('employee')->references('personalId')->on('employee')->onDelete('cascade');
        });
        Schema::create('division_manager', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('division');
            $table->string('manager');

            $table->foreign('division')->references('name')->on('division')->onDelete('cascade');
            $table->foreign('manager')->references('employee')->on('manager')->onDelete('cascade');
        });
        Schema::create('machinery_rawMaterial', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('machinery');
            $table->string('rawMaterial');

            $table->foreign('machinery')->references('serialNumber')->on('machinery')->onDelete('cascade');
            $table->foreign('rawMaterial')->references('name')->on('rawMaterial')->onDelete('cascade');
        });
        Schema::create('machinery_makarons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('machinery');
            $table->string('makarons');

            $table->foreign('machinery')->references('serialNumber')->on('machinery')->onDelete('cascade');
            $table->foreign('makarons')->references('name')->on('makarons')->onDelete('cascade');
        });
        Schema::create('employee_machinery', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employee', 11);
            $table->string('machinery');

            $table->foreign('employee')->references('personalId')->on('employee')->onDelete('cascade');
            $table->foreign('machinery')->references('serialNumber')->on('machinery')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('employee_machinery');
        Schema::dropIfExists('machinery_makarons');
        Schema::dropIfExists('machinery_rawMaterial');
        Schema::dropIfExists('manager_division');
        Schema::dropIfExists('employee_division');
        Schema::dropIfExists('discount_makarons');
        Schema::dropIfExists('order_makarons');
        Schema::dropIfExists('order');
        Schema::dropIfExists('review');
        Schema::dropIfExists('discount');
        Schema::dropIfExists('makarons');
        Schema::dropIfExists('client');
        Schema::dropIfExists('manager');
        Schema::dropIfExists('machinery');
        Schema::dropIfExists('rawMaterial');
        Schema::dropIfExists('division');
        Schema::dropIfExists('employee');
    }
}
