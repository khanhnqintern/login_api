<?php

namespace App\Interfaces\TodoList;
use App\Interfaces\CrudRepositoryInterface;


interface TodoListRepositoryInterface extends CrudRepositoryInterface
{
    public function filter(int $task_priority, int $status);
}
