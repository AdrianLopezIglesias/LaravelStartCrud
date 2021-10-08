<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pacientes;

class PacientesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pacientes()
    {
        $pacientes = Pacientes::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pacientes', $pacientes
        );

        $this->assertApiResponse($pacientes);
    }

    /**
     * @test
     */
    public function test_read_pacientes()
    {
        $pacientes = Pacientes::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pacientes/'.$pacientes->id
        );

        $this->assertApiResponse($pacientes->toArray());
    }

    /**
     * @test
     */
    public function test_update_pacientes()
    {
        $pacientes = Pacientes::factory()->create();
        $editedPacientes = Pacientes::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pacientes/'.$pacientes->id,
            $editedPacientes
        );

        $this->assertApiResponse($editedPacientes);
    }

    /**
     * @test
     */
    public function test_delete_pacientes()
    {
        $pacientes = Pacientes::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pacientes/'.$pacientes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pacientes/'.$pacientes->id
        );

        $this->response->assertStatus(404);
    }
}
