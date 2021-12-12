<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_tags', function (Blueprint $table) {
            $table->id();

            $table->foreignId('products_id')
                  ->constrained()
                  ->onUpdate('restrict')
                  ->onDelete('restrict');

            $table->foreignId('tags_id')
                  ->constrained()
                  ->onUpdate('restrict')
                  ->onDelete('restrict');

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
        Schema::dropIfExists('product_has_tags');
    }
}
