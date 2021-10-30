<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PacienteDatosPersonales;

class PacienteDatosPersonalesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/paciente_datos_personales', $pacienteDatosPersonales
        );

        $this->assertApiResponse($pacienteDatosPersonales);
    }

    /**
     * @test
     */
    public function test_read_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/paciente_datos_personales/'.$pacienteDatosPersonales->id
        );

        $this->assertApiResponse($pacienteDatosPersonales->toArray());
    }

    /**
     * @test
     */
    public function test_update_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();
        $editedPacienteDatosPersonales = PacienteDatosPersonales::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/paciente_datos_personales/'.$pacienteDatosPersonales->id,
            $editedPacienteDatosPersonales
        );

        $this->assertApiResponse($editedPacienteDatosPersonales);
    }

    /**
     * @test
     */
    public function test_delete_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/paciente_datos_personales/'.$pacienteDatosPersonales->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/paciente_datos_personales/'.$pacienteDatosPersonales->id
        );

        $this->response->assertStatus(404);
    }
}
