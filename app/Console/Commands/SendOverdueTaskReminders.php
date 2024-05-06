<?php

namespace App\Console\Commands;

use App\Models\ToDoList\ToDoList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ToDoList\OverdueTasksMail;

class SendOverdueTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-overdue-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders for overdue tasks';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the list of tasks due
        $overdueTasks = ToDoList::where('status', '!=', 1) // Get unfinished jobs
            ->where('end_date', '<', now()) // Get the jobs that are due
            ->get();

        // Send an email to the user with a list of tasks due
        foreach ($overdueTasks as $task) {
            Mail::to('nqk25092002@gmail.com')->send(new OverdueTasksMail($task));
        }

        $this->info('Email reminders for overdue tasks have been sent successfully.');
    }
}
