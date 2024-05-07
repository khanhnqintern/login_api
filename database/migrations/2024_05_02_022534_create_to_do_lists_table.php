<?php

use App\Enums\ToDoListStatus;
use App\Enums\ToDoListTaskPriority;
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
            $table->integer('task_priority')->default(ToDoListTaskPriority::low);
            $table->integer('status')->default(ToDoListStatus::unresolved);
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
