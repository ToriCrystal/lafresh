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
        Schema::create('bonus_policy_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bonus_policy_id');
            $table->integer('point');
            $table->integer('bonus');
            $table->foreign('bonus_policy_id')->references('id')->on('bonus_policy_details')->onDelete('cascade');
        });

        DB::table('bonus_policy_details')->insert([
            [
                'bonus_policy_id' => 1,
                'point' => 100,
                'bonus' => 2000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 300,
                'bonus' => 3000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 600,
                'bonus' => 4000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 800,
                'bonus' => 5000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 1200,
                'bonus' => 6000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 2400,
                'bonus' => 7000,
            ],
            [
                'bonus_policy_id' => 1,
                'point' => 4800,
                'bonus' => 8000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 500,
                'bonus' => 3000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 1000,
                'bonus' => 4000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 2000,
                'bonus' => 5000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 3000,
                'bonus' => 6000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 4000,
                'bonus' => 7000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 5000,
                'bonus' => 8000,
            ],
            [
                'bonus_policy_id' => 2,
                'point' => 6000,
                'bonus' => 9000,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_policy_details');
    }
};
