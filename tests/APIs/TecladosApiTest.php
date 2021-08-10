<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Teclados;

class TecladosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_teclados()
    {
        $teclados = Teclados::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/teclados', $teclados
        );

        $this->assertApiResponse($teclados);
    }

    /**
     * @test
     */
    public function test_read_teclados()
    {
        $teclados = Teclados::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/teclados/'.$teclados->id
        );

        $this->assertApiResponse($teclados->toArray());
    }

    /**
     * @test
     */
    public function test_update_teclados()
    {
        $teclados = Teclados::factory()->create();
        $editedTeclados = Teclados::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/teclados/'.$teclados->id,
            $editedTeclados
        );

        $this->assertApiResponse($editedTeclados);
    }

    /**
     * @test
     */
    public function test_delete_teclados()
    {
        $teclados = Teclados::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/teclados/'.$teclados->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/teclados/'.$teclados->id
        );

        $this->response->assertStatus(404);
    }
}
