<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetTodoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_successful_response(): void
    {
        $response = $this->get("/api/");
        $response->assertStatus(200)
                 ->assertJson([
                     "status" => 200,
                     "msg" => "Success",
                 ])
                 ->assertJsonStructure([
                     'status',
                     'msg',
                     'data' => [
                         '*' => [
                             'id',
                             'title',
                             'status'
                         ]
                     ]
                 ]);
    }


}
