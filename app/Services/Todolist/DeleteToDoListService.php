<?php

namespace App\Services\Todolist;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class DeleteToDoListService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try {
            return $this->toDoListRepository->delete($this->data->id);
        } catch (Exception $e) {
            Log::info($e);

            return false;
        }
    }
}
