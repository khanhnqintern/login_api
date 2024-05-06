<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoList\CreateToDoListRequest;
use App\Http\Requests\Todolist\UpdateToDoListRequest;
use App\Models\ToDoList\ToDoList;
use App\Services\Todolist\CreateToDoListService;
use App\Services\Todolist\DeleteToDoListService;
use App\Services\Todolist\FilterToDoListService;
use App\Services\Todolist\GetToDoListService;
use App\Services\Todolist\SearchToDoListService;
use App\Services\Todolist\ShowIdToDoListService;
use App\Services\Todolist\UpdateToDoListService;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{

    public function view()
    {
        return view('admin.To_do_list.view_todolist');
    }

    public function store(CreateToDoListRequest $request)
    {
        $toDoList = resolve(CreateToDoListService::class)->setParams($request->validated())->handle();
        if (!$toDoList) {
            return $this->responseErrors(__('todolist.create_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.create_success'),
            'toDoList' => $toDoList,
        ]);
    }

    public function index(Request $request)
    {
        $data['task_priority'] =  $request->input('task_priority');
        $data['status'] =  $request->input('status');

        $toDoList = resolve(GetToDoListService::class)->setParams($data)->handle();
        if (!$toDoList) {
            return $this->responseErrors(__('todolist.get_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.get_success'),
            'toDoList' => $toDoList,
        ]);
    }

    public function showToDoList($id)
    {
        $toDoList = resolve(ShowIdToDoListService::class)->setParams($id)->handle();
        if (!$toDoList) {
            return $this->responseErrors(__('todolist.showUser_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.showUser_success'),
            'toDoList' => $toDoList,
        ]);
    }

    public function update(UpdateToDoListRequest $request, $id)
    {
        $update = $request->validated();
        $update['id'] = $id;

        $toDoList = resolve(UpdateToDoListService::class)->setParams($update)->handle();

        if (!$toDoList) {
            return $this->responseErrors(__('todolist.update_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.update_success'),
            'toDoList' => $toDoList,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $toDoList = resolve(DeleteToDoListService::class)->setParams($request)->handle();

        if (!$toDoList) {
            return $this->responseErrors(__('todolist.delete_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.delete_success'),
            'toDoList' => $toDoList,
        ]);
    }

    public function search(Request $request)
    {
        $valueSearch = '%' . $request->valueSearch . '%';
        $toDoList = resolve(SearchToDoListService::class)->setParams($valueSearch)->handle();

        if (!$toDoList) {
            return $this->responseErrors(__('todolist.search_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.search_success'),
            'toDoList' => $toDoList,
        ]);
    }
}
