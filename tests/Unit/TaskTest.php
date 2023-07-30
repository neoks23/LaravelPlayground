<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

use function PHPUnit\Framework\assertTrue;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_save_to_db(): void
    {
        $task = new Task();
        $task->description = "New task";
        $task->user_id = 10;
        assertTrue($task->save());
    }

    public function test_lookup_new_task_in_db(): void
    {
        $task = new Task();
        $task->description = "New task";
        $task->user_id = 10;
        $task->save();
        $this->assertDatabaseHas('tasks', [
            'description' => "New task"
        ]);
    }
}
