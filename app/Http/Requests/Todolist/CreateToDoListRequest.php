<?php

namespace App\Http\Requests\ToDoList;

use App\Http\Requests\BaseRequest;


class CreateToDoListRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task_name' => [
                'required',
                'string',
                'between:6,255'
            ],
            'describe' => [
                'string',
            ],
            'start_date' => [
                'required',
                'date'
            ],
            'end_date' => [
                'required',
                'date'
            ],
            'task_priority' => [
                'required',
                'integer'
            ],
            'status' => [
                'required',
                'integer'
            ]
        ];
    }

    public function messages()
    {
        return [
            'task_name.required' => "Job Name cannot be empty!",
            'task_.string' => "Job Name is not in the correct format!",
            'task_.between' => "Job Name from 6 to 255 characters!",
            'describe.string' => "The job description is not in the correct format!",
            'start_date.required' => 'start date must be entered',
            'start_date.date' => 'date is not in correct format',
            'end_date.required' => 'end date must be entered',
            'end_date.date' => 'date is not in correct format',
            'task_priority.required' => "Task priority must be entered!",
            'task_priority.integer' => "Task priority is not in the correct format!",
            'status.required' => "Job status must be entered!",
            'status.integer' => "Job status is not in the correct format!",
        ];
    }
}
