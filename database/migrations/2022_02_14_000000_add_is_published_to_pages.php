<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $prefix = config('nova-cms.db_prefix');

        Schema::table($prefix.'pages', function (Blueprint $table) {
            $table->boolean('is_published')->default(true)->index();
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

        Schema::table($prefix.'pages', function (Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
};
