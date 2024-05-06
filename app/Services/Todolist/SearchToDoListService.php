<?php

namespace App\Services\Todolist;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class SearchToDoListService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try {
            return $this->toDoListRepository->search($this->data);
        } catch (Exception $e) {
            Log::info($e);
            return false;
        }
    }
}
