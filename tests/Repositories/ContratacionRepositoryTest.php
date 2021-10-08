<?php namespace Tests\Repositories;

use App\Models\Contratacion;
use App\Repositories\ContratacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContratacionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContratacionRepository
     */
    protected $contratacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contratacionRepo = \App::make(ContratacionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contratacion()
    {
        $contratacion = Contratacion::factory()->make()->toArray();

        $createdContratacion = $this->contratacionRepo->create($contratacion);

        $createdContratacion = $createdContratacion->toArray();
        $this->assertArrayHasKey('id', $createdContratacion);
        $this->assertNotNull($createdContratacion['id'], 'Created Contratacion must have id specified');
        $this->assertNotNull(Contratacion::find($createdContratacion['id']), 'Contratacion with given id must be in DB');
        $this->assertModelData($contratacion, $createdContratacion);
    }

    /**
     * @test read
     */
    public function test_read_contratacion()
    {
        $contratacion = Contratacion::factory()->create();

        $dbContratacion = $this->contratacionRepo->find($contratacion->id);

        $dbContratacion = $dbContratacion->toArray();
        $this->assertModelData($contratacion->toArray(), $dbContratacion);
    }

    /**
     * @test update
     */
    public function test_update_contratacion()
    {
        $contratacion = Contratacion::factory()->create();
        $fakeContratacion = Contratacion::factory()->make()->toArray();

        $updatedContratacion = $this->contratacionRepo->update($fakeContratacion, $contratacion->id);

        $this->assertModelData($fakeContratacion, $updatedContratacion->toArray());
        $dbContratacion = $this->contratacionRepo->find($contratacion->id);
        $this->assertModelData($fakeContratacion, $dbContratacion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contratacion()
    {
        $contratacion = Contratacion::factory()->create();

        $resp = $this->contratacionRepo->delete($contratacion->id);

        $this->assertTrue($resp);
        $this->assertNull(Contratacion::find($contratacion->id), 'Contratacion should not exist in DB');
    }
}
