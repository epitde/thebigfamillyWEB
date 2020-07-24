<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_user_id')->unsigned();
            $table->bigInteger('subcategory_user_id')->unsigned();
            $table->char('name',255)->nullable(false);
            $table->char('image',255)->nullable(true);
            $table->char('main_phone',20)->nullable(false);
            $table->text('main_address')->nullable(false);
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
        Schema::dropIfExists('general_profile');
    }
}
