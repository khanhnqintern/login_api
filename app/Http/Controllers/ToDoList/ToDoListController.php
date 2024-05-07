<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoList\CreateToDoListRequest;
use App\Http\Requests\Todolist\UpdateToDoListRequest;
use App\Services\Todolist\CreateToDoListService;
use App\Services\Todolist\DeleteToDoListService;
use App\Services\Todolist\GetToDoListService;
use App\Services\Todolist\SearchToDoListService;
use App\Services\Todolist\ShowIdToDoListService;
use App\Services\Todolist\UpdateToDoListService;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    // Return the view named 'view_todolist' located in the 'admin.To_do_list' directory
    public function view()
    {
        return view('admin.To_do_list.view_todolist');
    }

    /**
     * Store a newly created to-do list resource in storage.
     *
     * @param \App\Http\Requests\CreateToDoListRequest $request
     * @return App\Http\Controllers\Controller;
     */
    public function store(CreateToDoListRequest $request)
    {
        $data = resolve(CreateToDoListService::class)->setParams($request->validated())->handle();

        if (!$data) {
            return $this->responseErrors(__('todolist.create_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.create_success'),
            'data' => $data,
        ]);
    }

    /**
     * Display a listing of the to-do list resources.
     *
     * @param \Illuminate\Http\Request $request
     * @return App\Http\Controllers\Controller;
     */
    public function index(Request $request)
    {
        $data['task_priority'] =  $request->input('task_priority');
        $data['status'] =  $request->input('status');
        $result = resolve(GetToDoListService::class)->setParams($data)->handle();

        if (!$result) {
            return $this->responseErrors(__('todolist.get_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.get_success'),
            'result' => $result,
        ]);
    }

    /**
     * Display the specified to-do list resource.
     *
     * @param int $id
     * @return App\Http\Controllers\Controller;
     */
    public function showToDoList($id)
    {
        $data = resolve(ShowIdToDoListService::class)->setParams($id)->handle();

        if (!$data) {
            return $this->responseErrors(__('todolist.showUser_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.showUser_success'),
            'data' => $data,
        ]);
    }

    /**
     * Update the specified to-do list resource in storage.
     *
     * @param \App\Http\Requests\UpdateToDoListRequest $request
     * @param int $id
     * @return App\Http\Controllers\Controller;
     */
    public function update(UpdateToDoListRequest $request, $id)
    {
        $update = $request->validated();
        $update['id'] = $id;

        $data = resolve(UpdateToDoListService::class)->setParams($update)->handle();

        if (!$data) {
            return $this->responseErrors(__('todolist.update_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.update_success'),
            'data' => $data,
        ]);
    }

    /**
     * Delete the specified to-do list resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return App\Http\Controllers\Controller;
     */
    public function delete(Request $request, $id)
    {
        $data = resolve(DeleteToDoListService::class)->setParams($request)->handle();

        if (!$data) {
            return $this->responseErrors(__('todolist.delete_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.delete_success'),
            'data' => $data,
        ]);
    }

    /**
     * Search for to-do list resources based on a search value.
     *
     * @param \Illuminate\Http\Request $request
     * @return App\Http\Controllers\Controller;
     */
    public function search(Request $request)
    {
        $valueSearch = '%' . $request->valueSearch . '%';
        $data = resolve(SearchToDoListService::class)->setParams($valueSearch)->handle();

        if (!$data) {
            return $this->responseErrors(__('todolist.search_fail'));
        }

        return $this->responseSuccess([
            'message' => __('todolist.search_success'),
            'data' => $data,
        ]);
    }
}
