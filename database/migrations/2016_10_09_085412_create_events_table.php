<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->unsigned();
            $table->string('name')->default('');
            $table->enum('category', [
                'performance',
                'lecture',
            ]);
            $table->string('place')->default('');
            $table->datetime('from_time')->nullable();
            $table->datetime('to_time')->nullable();
            $table->string('description')->default('');
            $table->string('detail')->default('');
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
        Schema::drop('events');
    }
}
