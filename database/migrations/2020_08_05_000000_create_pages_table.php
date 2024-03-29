<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = config('nova-cms.db_prefix');

        Schema::create($prefix.'pages', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug');
            $table->boolean('is_home')->default(false);
            $table->json('top_banners')->nullable();
            $table->json('main_content')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('browser_title')->nullable();
            $table->json('robots')->nullable();
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
        $prefix = config('nova-cms.db_prefix');
        
        Schema::dropIfExists($prefix.'pages');
    }
}
