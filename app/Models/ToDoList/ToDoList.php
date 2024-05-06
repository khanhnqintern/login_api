<?php

namespace App\Models\ToDoList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ToDoList extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'to_do_lists';
    protected $fillable = [
        'task_name',
        'describe',
        'start_date',
        'end_date',
        'task_priority',
        'status',
    ];

    public function overdueTasks()
    {
        return self::where('status', '!=', 1) // Retrieve unfinished tasks
            ->where('end_date', '<', now()) // Get the work due
            ->get();
    }
}
