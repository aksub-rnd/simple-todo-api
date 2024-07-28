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

    /** @test */
    public function it_returns_an_internal_server_error()
    {
        $this->withoutExceptionHandling();

        $response = $this->getJson("/api/");

        $response->assertStatus(500)
                 ->assertExactJson([
                    "status" => 500,
                    "msg" => "Internal server error!"
                 ]);
    }
}
