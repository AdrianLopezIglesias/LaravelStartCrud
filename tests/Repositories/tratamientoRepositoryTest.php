<?php namespace Tests\Repositories;

use App\Models\tratamiento;
use App\Repositories\tratamientoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tratamientoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tratamientoRepository
     */
    protected $tratamientoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tratamientoRepo = \App::make(tratamientoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tratamiento()
    {
        $tratamiento = tratamiento::factory()->make()->toArray();

        $createdtratamiento = $this->tratamientoRepo->create($tratamiento);

        $createdtratamiento = $createdtratamiento->toArray();
        $this->assertArrayHasKey('id', $createdtratamiento);
        $this->assertNotNull($createdtratamiento['id'], 'Created tratamiento must have id specified');
        $this->assertNotNull(tratamiento::find($createdtratamiento['id']), 'tratamiento with given id must be in DB');
        $this->assertModelData($tratamiento, $createdtratamiento);
    }

    /**
     * @test read
     */
    public function test_read_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();

        $dbtratamiento = $this->tratamientoRepo->find($tratamiento->id);

        $dbtratamiento = $dbtratamiento->toArray();
        $this->assertModelData($tratamiento->toArray(), $dbtratamiento);
    }

    /**
     * @test update
     */
    public function test_update_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();
        $faketratamiento = tratamiento::factory()->make()->toArray();

        $updatedtratamiento = $this->tratamientoRepo->update($faketratamiento, $tratamiento->id);

        $this->assertModelData($faketratamiento, $updatedtratamiento->toArray());
        $dbtratamiento = $this->tratamientoRepo->find($tratamiento->id);
        $this->assertModelData($faketratamiento, $dbtratamiento->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tratamiento()
    {
        $tratamiento = tratamiento::factory()->create();

        $resp = $this->tratamientoRepo->delete($tratamiento->id);

        $this->assertTrue($resp);
        $this->assertNull(tratamiento::find($tratamiento->id), 'tratamiento should not exist in DB');
    }
}
