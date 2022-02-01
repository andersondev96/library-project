<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 255)->unique();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->string('publishing_company', 255);
            $table->string('publication_place', 255);
            $table->date('publication_date');
            $table->integer('publisher_number');
            $table->integer('available_quantity');
            $table->integer('borrowed_amounts')->default(0);
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
        Schema::dropIfExists('books');
    }
}
