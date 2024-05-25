<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\DefaultStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->tinyInteger('status')->default(DefaultStatus::Published->value);
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->foreignId('menu_id');
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('reference_id')->nullable();
            $table->string('reference_type', 60)->nullable();
            $table->string('url')->nullable();
            $table->string('icon_font', 50)->nullable();
            $table->tinyInteger('position')->unsigned()->default(0);
            $table->string('title')->nullable();
            $table->string('css_class')->nullable();
            $table->string('target', 20)->default('_self');
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
        });

        Schema::create('menu_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('menu_id')->nullable();
            $table->string('location')->unique();
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menu_locations');
    }
};
