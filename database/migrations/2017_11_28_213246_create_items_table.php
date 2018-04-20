<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->string('name', 200);
            $table->integer('vendors_id');
            $table->integer('types_id');
            $table->string('sku', 30);
            $table->string('price', 10);
            $table->string('weight', 10)->nullable();
            $table->string('color', 10)->nullable();
            $table->date('release_date');
            $table->string('photo')->nullable();
            $table->longtext('tags')->nullable();
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
        Schema::dropIfExists('items');
    }
}
