<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->timestamps();

            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('Category_id');
            $table->string('prise')->nullable();
            $table->string('discount')->nullable();
            $table->string('image')->nullable();
            // xozir magazinda bormi yoqmi? | 1 ha , 0 yoq
            $table->integer('on_stock')->nullable();
            $table->integer('hit')->nullable()->default(0);
            $table->integer('recommended')->nullable()->default(0);
;
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
}
