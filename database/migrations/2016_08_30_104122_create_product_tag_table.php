<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::create('product_tag', function (Blueprint $table) {
        $table->integer('tag_id');
        $table->integer('product_id')->unsigned()->index();

        $table->foreign('product_id')->references('id')->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
    });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_tag');
    }
}
