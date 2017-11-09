<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name_pd')->unique();
            $table->text('des_pd');
            $table->integer('id_cat')->unsigned();
            $table->integer('id_size')->unsigned();
            $table->float('price_pd', 8, 2);
            $table->tinyInteger('status');
            $table->string('img_pd');
            $table->integer('qty_pd');
            $table->timestamps();

            // tao khoa ngoai
            $table->foreign('id_cat')->references('id')->on('category')->onDelete('cascade');

            $table->foreign('id_size')->references('id')->on('size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('product');
    }
}
