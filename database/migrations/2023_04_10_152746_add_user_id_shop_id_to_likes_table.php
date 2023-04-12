<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdShopIdToLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
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
        Schema::table('likes', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('shop_id');
        });
    }
}
