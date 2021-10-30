<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Profesional;

class ProfesionalApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_profesional()
    {
        $profesional = Profesional::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/profesionals', $profesional
        );

        $this->assertApiResponse($profesional);
    }

    /**
     * @test
     */
    public function test_read_profesional()
    {
        $profesional = Profesional::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/profesionals/'.$profesional->id
        );

        $this->assertApiResponse($profesional->toArray());
    }

    /**
     * @test
     */
    public function test_update_profesional()
    {
        $profesional = Profesional::factory()->create();
        $editedProfesional = Profesional::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/profesionals/'.$profesional->id,
            $editedProfesional
        );

        $this->assertApiResponse($editedProfesional);
    }

    /**
     * @test
     */
    public function test_delete_profesional()
    {
        $profesional = Profesional::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/profesionals/'.$profesional->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/profesionals/'.$profesional->id
        );

        $this->response->assertStatus(404);
    }
}
