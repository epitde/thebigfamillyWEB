<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoryUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_user_id')->unsigned();
            $table->char('name',255)->nullable(false);
            $table->enum('type',['ORG','PP'])->nullable(false);
            $table->tinyInteger('is_special')->default(0)->nullable(false);
            $table->tinyInteger('status')->default(1)->nullable(false);
            $table->foreign('category_user_id')
                ->references('id')->on('category_user')->onDelete('cascade');
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
        Schema::dropIfExists('subcategory_user');
    }
}
