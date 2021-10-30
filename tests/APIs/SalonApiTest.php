<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Salon;

class SalonApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_salon()
    {
        $salon = Salon::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/salons', $salon
        );

        $this->assertApiResponse($salon);
    }

    /**
     * @test
     */
    public function test_read_salon()
    {
        $salon = Salon::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/salons/'.$salon->id
        );

        $this->assertApiResponse($salon->toArray());
    }

    /**
     * @test
     */
    public function test_update_salon()
    {
        $salon = Salon::factory()->create();
        $editedSalon = Salon::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/salons/'.$salon->id,
            $editedSalon
        );

        $this->assertApiResponse($editedSalon);
    }

    /**
     * @test
     */
    public function test_delete_salon()
    {
        $salon = Salon::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/salons/'.$salon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/salons/'.$salon->id
        );

        $this->response->assertStatus(404);
    }
}
