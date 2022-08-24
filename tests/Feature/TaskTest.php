<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * Get all Tasks.
     *
     * @test
     * @return void
     */
    public function list_all_test()
    {
        $response = $this->get('/api/task');

        $response->assertStatus(200);
    }


    /**
     * Add a new task
     *
     * @test
     * @return void
     */
    public function add_task()
    {
        $response = $this->post('/api/task', [
            'name' => 'test',
            'is_finished' => false,
        ]);

        $response->assertStatus(200);
    }


    /**
     * Add a new task
     *
     * @test
     * @return void
     */
    public function update_task()
    {

        $task = Task::create([
            'name' => 'testing',
            'is_finished' => false
        ]);

        $response = $this->put('/api/task/' . $task->id, [
            'name' => 'test123',
            'is_finished' => false,
        ]);

        $response->assertStatus(200);
    }


    /**
     * Add a new task
     *
     * @test
     * @return void
     */
    public function delete_task()
    {
        $task = Task::create([
            'name' => 'testing',
            'is_finished' => false
        ]);

        $response = $this->delete('/api/task/' . $task->id);
        $response->assertStatus(200);
    }
}
