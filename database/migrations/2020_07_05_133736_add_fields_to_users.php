<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('surname',150)->after('name');
            $table->enum('type',['A','O','P','I'])->default('I')->after('remember_token');
            $table->tinyInteger('status')->default(0)->after('type');
            $table->timestamp('last_login')->nullable()->after('status');
            $table->tinyInteger('is_login')->default(0)->after('last_login');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['surname', 'type', 'status','last_login','is_login']);
        });
    }
}
