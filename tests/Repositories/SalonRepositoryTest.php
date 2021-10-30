<?php namespace Tests\Repositories;

use App\Models\Salon;
use App\Repositories\SalonRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SalonRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalonRepository
     */
    protected $salonRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->salonRepo = \App::make(SalonRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_salon()
    {
        $salon = Salon::factory()->make()->toArray();

        $createdSalon = $this->salonRepo->create($salon);

        $createdSalon = $createdSalon->toArray();
        $this->assertArrayHasKey('id', $createdSalon);
        $this->assertNotNull($createdSalon['id'], 'Created Salon must have id specified');
        $this->assertNotNull(Salon::find($createdSalon['id']), 'Salon with given id must be in DB');
        $this->assertModelData($salon, $createdSalon);
    }

    /**
     * @test read
     */
    public function test_read_salon()
    {
        $salon = Salon::factory()->create();

        $dbSalon = $this->salonRepo->find($salon->id);

        $dbSalon = $dbSalon->toArray();
        $this->assertModelData($salon->toArray(), $dbSalon);
    }

    /**
     * @test update
     */
    public function test_update_salon()
    {
        $salon = Salon::factory()->create();
        $fakeSalon = Salon::factory()->make()->toArray();

        $updatedSalon = $this->salonRepo->update($fakeSalon, $salon->id);

        $this->assertModelData($fakeSalon, $updatedSalon->toArray());
        $dbSalon = $this->salonRepo->find($salon->id);
        $this->assertModelData($fakeSalon, $dbSalon->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_salon()
    {
        $salon = Salon::factory()->create();

        $resp = $this->salonRepo->delete($salon->id);

        $this->assertTrue($resp);
        $this->assertNull(Salon::find($salon->id), 'Salon should not exist in DB');
    }
}
