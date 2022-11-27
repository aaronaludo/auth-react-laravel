<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_statuses = ['Active', 'Completed'];

        foreach($task_statuses as $status) {
            $task_status = new TaskStatus;
            $task_status->name = $status;
            $task_status->save();
        }
    }
}
