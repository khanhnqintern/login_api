<?php

namespace App\Services\Todolist;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class ShowIdToDoListService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try {
            $toDoList = $this->toDoListRepository->find($this->data);

            return $toDoList;
        } catch (Exception $e) {
            Log::info($e);
        }
    }
}
