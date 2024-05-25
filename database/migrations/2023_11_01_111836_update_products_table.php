<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('brochure')->nullable()->after('content_download');
            $table->text('datasheet')->nullable()->after('brochure');
            $table->text('user_manual')->nullable()->after('datasheet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('brochure');
            $table->dropColumn('datasheet');
            $table->dropColumn('user_manual');
        });
    }
};
