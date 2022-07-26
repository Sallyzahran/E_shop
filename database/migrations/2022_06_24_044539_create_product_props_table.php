<?php

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
        if (!Schema::hasTable('product_props')) {
            Schema::create('product_props', function (Blueprint $table) {
                $table->id();
                $table->string('key_en');
                $table->string('key_ar');
                $table->string('value_en');
                $table->string('value_ar');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_props');
    }
};
