<?php

use App\Enums\Product\{ProductFeature, ProductNew, ProductStatus, ProductUnit};
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('price')->default(0);
            $table->double('price_selling')->default(0);
            $table->double('price_promotion')->default(0);
            $table->char('sku', 50)->nullable();
            $table->boolean('manager_stock')->default(false);
            $table->integer('qty')->default(0);
            $table->boolean('in_stock')->default(true);
            $table->tinyInteger('status')->default(ProductStatus::Published->value);
            $table->text('feature_image')->nullable();
            $table->text('gallery')->nullable();
            $table->text('short_desc')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('content_specification')->nullable();
            $table->longText('content_application')->nullable();
            $table->longText('content_download')->nullable();
            $table->tinyInteger('unit')->default(ProductUnit::Pail->value);
            $table->tinyInteger('feature')->default(ProductFeature::No->value);
            $table->tinyInteger('new')->default(ProductNew::No->value);
            $table->integer('viewed')->unsigned()->default(0);
            $table->string('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
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
        Schema::dropIfExists('products');
    }
};
