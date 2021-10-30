<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProfesionalHorario;

class ProfesionalHorarioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/profesional_horarios', $profesionalHorario
        );

        $this->assertApiResponse($profesionalHorario);
    }

    /**
     * @test
     */
    public function test_read_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/profesional_horarios/'.$profesionalHorario->id
        );

        $this->assertApiResponse($profesionalHorario->toArray());
    }

    /**
     * @test
     */
    public function test_update_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();
        $editedProfesionalHorario = ProfesionalHorario::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/profesional_horarios/'.$profesionalHorario->id,
            $editedProfesionalHorario
        );

        $this->assertApiResponse($editedProfesionalHorario);
    }

    /**
     * @test
     */
    public function test_delete_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/profesional_horarios/'.$profesionalHorario->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/profesional_horarios/'.$profesionalHorario->id
        );

        $this->response->assertStatus(404);
    }
}
