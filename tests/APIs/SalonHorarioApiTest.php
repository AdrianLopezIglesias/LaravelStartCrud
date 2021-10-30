<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SalonHorario;

class SalonHorarioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/salon_horarios', $salonHorario
        );

        $this->assertApiResponse($salonHorario);
    }

    /**
     * @test
     */
    public function test_read_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/salon_horarios/'.$salonHorario->id
        );

        $this->assertApiResponse($salonHorario->toArray());
    }

    /**
     * @test
     */
    public function test_update_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();
        $editedSalonHorario = SalonHorario::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/salon_horarios/'.$salonHorario->id,
            $editedSalonHorario
        );

        $this->assertApiResponse($editedSalonHorario);
    }

    /**
     * @test
     */
    public function test_delete_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/salon_horarios/'.$salonHorario->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/salon_horarios/'.$salonHorario->id
        );

        $this->response->assertStatus(404);
    }
}
