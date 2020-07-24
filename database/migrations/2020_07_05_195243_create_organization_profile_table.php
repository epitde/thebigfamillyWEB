<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_user_id')->unsigned();
            $table->bigInteger('subcategory_user_id')->unsigned();
            $table->char('name',255)->nullable(false);
            $table->char('logo',255)->nullable(true);
            $table->char('responsible',255)->nullable(false);
            $table->char('main_phone',20)->nullable(false);
            $table->text('main_address')->nullable(false);
            $table->decimal('latitude',16,6)->nullable(false);
            $table->decimal('longitude',16,6)->nullable(false);
            $table->char('extra_phone',20)->nullable(true)->default(null);
            $table->text('extra_address')->nullable(true)->default(null);
            $table->tinyInteger('digitally_identified_user')->default(0);
            $table->text('digitally_identified_user_info')->nullable(true);
            $table->tinyInteger('alternative_identified_user')->default(0);
            $table->bigInteger('alternative_identified_user_id')->unsigned()->nullable(true);
            $table->bigInteger('user_id')->unsigned()->nullable(false);
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('organization_profile');
    }
}
