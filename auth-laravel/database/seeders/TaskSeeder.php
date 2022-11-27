<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'name' => 'Task one',
                'task_status_id' => 1,
                'arrangement_id' => 5
            ],
            [
                'name' => 'Task two',
                'task_status_id' => 1,
                'arrangement_id' => 4
            ],
            [
                'name' => 'Task three',
                'task_status_id' => 1,
                'arrangement_id' => 3
            ],
            [
                'name' => 'Task four',
                'task_status_id' => 1,
                'arrangement_id' => 2
            ],
            [
                'name' => 'Task five',
                'task_status_id' => 1,
                'arrangement_id' => 1
            ],
        ];

        foreach($tasks as $task) {
            $s = new Task;
            $s->name = $task['name'];
            $s->task_status_id = $task['task_status_id'];
            $s->arrangement_id = $task['arrangement_id'];
            $s->save();
        }
    }
}
