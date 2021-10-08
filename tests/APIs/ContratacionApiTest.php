<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Contratacion;

class ContratacionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contratacion()
    {
        $contratacion = Contratacion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contratacions', $contratacion
        );

        $this->assertApiResponse($contratacion);
    }

    /**
     * @test
     */
    public function test_read_contratacion()
    {
        $contratacion = Contratacion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/contratacions/'.$contratacion->id
        );

        $this->assertApiResponse($contratacion->toArray());
    }

    /**
     * @test
     */
    public function test_update_contratacion()
    {
        $contratacion = Contratacion::factory()->create();
        $editedContratacion = Contratacion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contratacions/'.$contratacion->id,
            $editedContratacion
        );

        $this->assertApiResponse($editedContratacion);
    }

    /**
     * @test
     */
    public function test_delete_contratacion()
    {
        $contratacion = Contratacion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contratacions/'.$contratacion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contratacions/'.$contratacion->id
        );

        $this->response->assertStatus(404);
    }
}
