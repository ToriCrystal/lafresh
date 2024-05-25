<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bonus_policies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('unit');
        });

        DB::table('bonus_policies')->insert([
          [
            'unit' => 1,
          ],
          [
            'unit' => 2,
          ]  
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_policy');
    }
};
