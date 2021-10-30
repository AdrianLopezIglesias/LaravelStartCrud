<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProfesionalTratamiento;

class ProfesionalTratamientoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/profesional_tratamientos', $profesionalTratamiento
        );

        $this->assertApiResponse($profesionalTratamiento);
    }

    /**
     * @test
     */
    public function test_read_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/profesional_tratamientos/'.$profesionalTratamiento->id
        );

        $this->assertApiResponse($profesionalTratamiento->toArray());
    }

    /**
     * @test
     */
    public function test_update_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();
        $editedProfesionalTratamiento = ProfesionalTratamiento::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/profesional_tratamientos/'.$profesionalTratamiento->id,
            $editedProfesionalTratamiento
        );

        $this->assertApiResponse($editedProfesionalTratamiento);
    }

    /**
     * @test
     */
    public function test_delete_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/profesional_tratamientos/'.$profesionalTratamiento->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/profesional_tratamientos/'.$profesionalTratamiento->id
        );

        $this->response->assertStatus(404);
    }
}
