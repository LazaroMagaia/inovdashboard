<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('client_type');
        });
    }
    
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->enum('client_type', ['system', 'campaign', 'both'])->default('both');
        });
    }
    
};
