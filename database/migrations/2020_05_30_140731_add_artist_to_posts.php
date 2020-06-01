<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->string('artist_name');
            $table->string('apple_music')->nullable();
            $table->string('spotify_id')->nullable();
            $table->string('youtube_id')->nullable();
            $table->string('band_camp_id')->nullable();
            $table->string('soundcloud_id')->nullable();
            $table->string('webpage')->nullable();

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

            $table->dropColumn('name');
            $table->dropColumn('apple_music')->nullable();
            $table->dropColumn('spotify_id')->nullable();
            $table->dropColumn('youtube_id')->nullable();
            $table->dropColumn('band_camp_id')->nullable();
            $table->dropColumn('soundcloud_id')->nullable();
            $table->dropColumn('webpage')->nullable();
        });
    }
}
