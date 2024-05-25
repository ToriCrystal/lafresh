<?php

use App\Enums\Category\CategoryStatus;
use App\Enums\ProductCategory\ProductCategoryShowHome;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('_lft');
            $table->integer('_rgt');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('icon')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('position')->default(0);
            $table->tinyInteger('status')->default(CategoryStatus::Published->value);
            $table->tinyInteger('show_home')->default(ProductCategoryShowHome::No->value);
            $table->longText('desc')->nullable();
            $table->string('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('SET NULL');
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
