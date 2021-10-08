<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tratamiento;

class tratamientoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tratamiento()
    {
        $tratamiento = tratamiento::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tratamientos', $tratamiento
        );

        $this->assertApiResponse($tratamiento);
    }

    /**
     * @test
     */
    public function test_read_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tratamientos/'.$tratamiento->id
        );

        $this->assertApiResponse($tratamiento->toArray());
    }

    /**
     * @test
     */
    public function test_update_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();
        $editedtratamiento = tratamiento::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tratamientos/'.$tratamiento->id,
            $editedtratamiento
        );

        $this->assertApiResponse($editedtratamiento);
    }

    /**
     * @test
     */
    public function test_delete_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tratamientos/'.$tratamiento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tratamientos/'.$tratamiento->id
        );

        $this->response->assertStatus(404);
    }
}
