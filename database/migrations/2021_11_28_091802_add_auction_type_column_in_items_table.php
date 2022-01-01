<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuctionTypeColumnInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->enum('post_type', [
                'auction',
                'normal',
            ])->default('normal');
            $table->datetime('auction_expiry_time')->nullable();
            $table->float('min_bid')->nullable();
            $table->float('max_bid')->nullable();
            $table->smallInteger('expiry_hours')->nullable();
            $table->smallInteger('expiry_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn([
                'post_type',
                'auction_expiry_time',
            ]);
        });
    }
}
