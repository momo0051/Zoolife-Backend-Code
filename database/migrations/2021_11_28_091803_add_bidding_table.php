<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBiddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidding', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id');
            $table->float('bid_amount')->default(0);
            $table->boolean('is_winner')->default(false);
            $table->unsignedInteger('bid_by_user_id');
            $table->timestamps();
        });

        Schema::table('bidding', function (Blueprint $blueprint) {
            $blueprint->index('item_id');
            $blueprint->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidding');
    }
}
