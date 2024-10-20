<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('download')->nullable();
            $table->float('upload')->nullable();
            $table->float('ping')->nullable();
            $table->string('server_url')->nullable();
            $table->string('server_lat')->nullable();
            $table->string('server_lon')->nullable();
            $table->string('server_name')->nullable();
            $table->string('server_country')->nullable();
            $table->string('server_id')->nullable();
            $table->string('server_latency')->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->bigInteger('bytes_sent')->nullable();
            $table->bigInteger('bytes_received')->nullable();
            $table->string('client_ip')->nullable();
            $table->string('client_lat')->nullable();
            $table->string('client_lon')->nullable();
            $table->string('client_isp')->nullable();
            $table->string('client_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
