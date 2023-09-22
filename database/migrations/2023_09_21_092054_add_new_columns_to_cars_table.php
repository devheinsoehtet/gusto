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
        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('number', 'registration_no');

            $table->unique('registration_no', 'unique_registration_no');

            $table->string('brand', 255);
            $table->json('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropIndex('unique_registration_no');

            $table->renameColumn('registration_no', 'number');
            $table->dropColumn(['brand', 'properties']);
        });
    }
};
