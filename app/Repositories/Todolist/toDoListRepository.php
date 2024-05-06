<?php

namespace App\Repositories\Todolist;

use App\Interfaces\TodoList\TodoListRepositoryInterface;
use App\Models\ToDoList\ToDoList;
use App\Repositories\BaseRepository;

class toDoListRepository extends BaseRepository implements TodoListRepositoryInterface
{
    public function __construct(ToDoList $toDoList)
    {
        $this->model = $toDoList;
    }

    public function search($value_search)
    {
        return $this->model->where('task_name', 'like', $value_search)
            ->orWhere('describe', 'like', $value_search)
            ->get();
    }

    public function filter($task_priority, $status)
    {
        return $this->model->when(!empty($task_priority), function ($q) use ($task_priority) {
                $q->where('task_priority', $task_priority);
            })
            ->when(!empty($status), function ($q) use ($status) {
                $q->where('status', $status);
            });
    }
}
