<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAUserCanBrowseThreads()
    {
        $thread = factory(Thread::class)->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    public function testAUserCanReadASingleThread()
    {
        $thread = factory(Thread::class)->create();

        $response = $this->get("/threads/{$thread->id}");
        $response->assertSee($thread->title);
    }
}
