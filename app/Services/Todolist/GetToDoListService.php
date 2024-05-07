<?php

namespace App\Services\Todolist;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class GetToDoListService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try
        {
            $toDoList = $this->toDoListRepository->filter($this->data['task_priority'], $this->data['status'])->get();

            return $toDoList;
        } catch (Exception $e) {
            Log::info($e);
        }
    }
}
