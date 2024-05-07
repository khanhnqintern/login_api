<?php

namespace App\Http\Requests\Todolist;

use App\Http\Requests\BaseRequest;

class UpdateToDoListRequest extends BaseRequest
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
                'string',
                'between:6,255'
            ],
            'describe' => [
                'string',
            ],
            'start_date' => [
                'date'
            ],
            'end_date' => [
                'date'
            ],
            'task_priority' => [
                'integer'
            ],
            'status' => [
                'integer'
            ]
        ];
    }

    public function messages()
    {
        return [
            'task_.string' => "Job Name is not in the correct format!",
            'task_.between' => "Job Name from 6 to 255 characters!",
            'describe.string' => "The job description is not in the correct format!",
            'start_date.date' => 'date is not in correct format',
            'end_date.date' => 'date is not in correct format',
            'task_priority.integer' => "Task priority is not in the correct format!",
            'status.integer' => "Job status is not in the correct format!",
        ];
    }
}
