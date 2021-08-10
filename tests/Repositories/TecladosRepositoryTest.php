<?php namespace Tests\Repositories;

use App\Models\Teclados;
use App\Repositories\TecladosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TecladosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TecladosRepository
     */
    protected $tecladosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tecladosRepo = \App::make(TecladosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_teclados()
    {
        $teclados = Teclados::factory()->make()->toArray();

        $createdTeclados = $this->tecladosRepo->create($teclados);

        $createdTeclados = $createdTeclados->toArray();
        $this->assertArrayHasKey('id', $createdTeclados);
        $this->assertNotNull($createdTeclados['id'], 'Created Teclados must have id specified');
        $this->assertNotNull(Teclados::find($createdTeclados['id']), 'Teclados with given id must be in DB');
        $this->assertModelData($teclados, $createdTeclados);
    }

    /**
     * @test read
     */
    public function test_read_teclados()
    {
        $teclados = Teclados::factory()->create();

        $dbTeclados = $this->tecladosRepo->find($teclados->id);

        $dbTeclados = $dbTeclados->toArray();
        $this->assertModelData($teclados->toArray(), $dbTeclados);
    }

    /**
     * @test update
     */
    public function test_update_teclados()
    {
        $teclados = Teclados::factory()->create();
        $fakeTeclados = Teclados::factory()->make()->toArray();

        $updatedTeclados = $this->tecladosRepo->update($fakeTeclados, $teclados->id);

        $this->assertModelData($fakeTeclados, $updatedTeclados->toArray());
        $dbTeclados = $this->tecladosRepo->find($teclados->id);
        $this->assertModelData($fakeTeclados, $dbTeclados->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_teclados()
    {
        $teclados = Teclados::factory()->create();

        $resp = $this->tecladosRepo->delete($teclados->id);

        $this->assertTrue($resp);
        $this->assertNull(Teclados::find($teclados->id), 'Teclados should not exist in DB');
    }
}
