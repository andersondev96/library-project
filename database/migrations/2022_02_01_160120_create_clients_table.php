<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 14)->unique();
            $table->string('rg', 10)->unique();
            $table->string('name', 100);
            $table->date('birth_date');
            $table->unsignedBigInteger('address_id');
            $table->string('email', 100)->unique();
            $table->string('telephone', 14)->unique();
            $table->string('type', 20);
            $table->string('department', 100);
            $table->integer('books')->default(0);
            $table->decimal('traffic_ticket', $precision = 8, $scale = 2)->default(0.0);
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
