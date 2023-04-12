<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdShopIdToReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserves', function (Blueprint $table) {
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('shop_id')
                    ->constrained('shops')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserves', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('shop_id');
        });
    }
}
