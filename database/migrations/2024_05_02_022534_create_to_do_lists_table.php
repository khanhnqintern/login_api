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
        Schema::create('to_do_lists', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->longText('describe')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            // Priority level: 1 = high / 2 = medium / 3 = low
            $table->integer('task_priority')->default(3);
            // Status: 1 = completed / 2 = pending / 3 = unresolved
            $table->integer('status')->default(3);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_lists');
    }
};
