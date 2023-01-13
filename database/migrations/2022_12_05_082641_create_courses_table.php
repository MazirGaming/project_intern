<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('link')->nullable();
            $table->decimal('price', 17, 2);
            $table->decimal('old_price', 17, 2);
            $table->bigInteger('created_by');
            $table->bigInteger('category_id')->unsigned();
            $table->integer('lessons')->default(0);
            $table->integer('view_count')->default(0);
            $table->json('benefits')->nullable();
            $table->json('fqa')->nullable();
            $table->tinyInteger('is_feature');
            $table->tinyInteger('is_online');
            $table->text('description');
            $table->longText('content');
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keyword')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
