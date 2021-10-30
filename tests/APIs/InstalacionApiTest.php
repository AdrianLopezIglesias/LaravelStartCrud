<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Instalacion;

class InstalacionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_instalacion()
    {
        $instalacion = Instalacion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/instalacions', $instalacion
        );

        $this->assertApiResponse($instalacion);
    }

    /**
     * @test
     */
    public function test_read_instalacion()
    {
        $instalacion = Instalacion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/instalacions/'.$instalacion->id
        );

        $this->assertApiResponse($instalacion->toArray());
    }

    /**
     * @test
     */
    public function test_update_instalacion()
    {
        $instalacion = Instalacion::factory()->create();
        $editedInstalacion = Instalacion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/instalacions/'.$instalacion->id,
            $editedInstalacion
        );

        $this->assertApiResponse($editedInstalacion);
    }

    /**
     * @test
     */
    public function test_delete_instalacion()
    {
        $instalacion = Instalacion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/instalacions/'.$instalacion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/instalacions/'.$instalacion->id
        );

        $this->response->assertStatus(404);
    }
}
