<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToOrganizationProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization_profile', function (Blueprint $table) {
            $table->integer('org_type')->nullable();
            $table->string('org_sector')->nullable();
            $table->double('radius_of_action')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organization_profile', function (Blueprint $table) {
            //
        });
    }
}
