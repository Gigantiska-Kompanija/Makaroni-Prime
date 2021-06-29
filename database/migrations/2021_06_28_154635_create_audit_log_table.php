<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('audit_log', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type'); // auth-success, auth-fail, register, create-*, edit-*, destroy-*,
            $table->ipAddress('ip');
            $table->string('email')->nullable();
            $table->timestamp('time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('audit_log');
    }
}
