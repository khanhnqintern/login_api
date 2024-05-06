<?php

namespace App\Services\Todolist;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class UpdateToDoListService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try {
            return $this->toDoListRepository->update($this->data, $this->data['id']);

        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }
}
