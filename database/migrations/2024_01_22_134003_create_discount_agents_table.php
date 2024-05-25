<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_agents', function (Blueprint $table) {
            $table->id();
            $table->text('discount_data');
        });

        DB::table('discount_agents')->insert([
            [
                'discount_data' => json_encode(['level' => 1, 'pail' => 25, 'bottle' => 35]),
            ],
            [
                'discount_data' => json_encode(['level' => 2, 'pail' => 20, 'bottle' => 30]),
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
        Schema::dropIfExists('discount_agents');
    }
};
