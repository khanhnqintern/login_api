<?php

namespace App\Services\User;

use App\Interfaces\CrudRepositoryInterface;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class ShowIdUserService extends BaseService
{
    protected $toDoListRepository;

    public function __construct(CrudRepositoryInterface $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
    }

    public function handle()
    {
        try {
            $user = $this->toDoListRepository->find($this->data);

            return $user;
        } catch (Exception $e) {
            Log::info($e);
        }
    }
}
