<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonationToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('show'); // 1 or 0
            $table->string('donately_url')->nullable();
            $table->string('fund_url')->nullable();
            $table->string('fund_name')->nullable();
            $table->string('fund_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('show'); // 1 or 0
            $table->dropColumn('donately_url')->nullable();
            $table->dropColumn('fund_url')->nullable();
            $table->dropColumn('fund_name')->nullable();
            $table->dropColumn('fund_text')->nullable();
        });
    }
}
