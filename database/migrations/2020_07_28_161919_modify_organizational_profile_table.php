<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrganizationalProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization_profile', function (Blueprint $table) {
            $table->bigInteger('category_user_id')->nullable(true)->change();
            $table->bigInteger('subcategory_user_id')->nullable(true)->change();
            $table->string('responsible', 255)->nullable(true)->change();
            $table->decimal('latitude')->nullable(true)->change();
            $table->decimal('longitude')->nullable(true)->change();
            $table->integer('birth_year')->nullable();
            $table->integer('birth_month')->nullable();
            $table->integer('birth_day')->nullable();
            $table->string('profession')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('govt_identification')->nullable();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
