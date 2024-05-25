<?php

use App\Enums\Post\PostStatus;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('feature_image')->nullable();
            $table->tinyInteger('status')->default(PostStatus::Published->value);
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('title_seo')->nullable();
            $table->text('desc_seo')->nullable();
            $table->integer('viewed')->unsigned()->default(0);
            $table->dateTime('posted_at');
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
        Schema::dropIfExists('posts');
    }
};
