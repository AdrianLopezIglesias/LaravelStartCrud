<?php namespace Tests\Repositories;

use App\Models\Instalacion;
use App\Repositories\InstalacionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class InstalacionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var InstalacionRepository
     */
    protected $instalacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->instalacionRepo = \App::make(InstalacionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_instalacion()
    {
        $instalacion = Instalacion::factory()->make()->toArray();

        $createdInstalacion = $this->instalacionRepo->create($instalacion);

        $createdInstalacion = $createdInstalacion->toArray();
        $this->assertArrayHasKey('id', $createdInstalacion);
        $this->assertNotNull($createdInstalacion['id'], 'Created Instalacion must have id specified');
        $this->assertNotNull(Instalacion::find($createdInstalacion['id']), 'Instalacion with given id must be in DB');
        $this->assertModelData($instalacion, $createdInstalacion);
    }

    /**
     * @test read
     */
    public function test_read_instalacion()
    {
        $instalacion = Instalacion::factory()->create();

        $dbInstalacion = $this->instalacionRepo->find($instalacion->id);

        $dbInstalacion = $dbInstalacion->toArray();
        $this->assertModelData($instalacion->toArray(), $dbInstalacion);
    }

    /**
     * @test update
     */
    public function test_update_instalacion()
    {
        $instalacion = Instalacion::factory()->create();
        $fakeInstalacion = Instalacion::factory()->make()->toArray();

        $updatedInstalacion = $this->instalacionRepo->update($fakeInstalacion, $instalacion->id);

        $this->assertModelData($fakeInstalacion, $updatedInstalacion->toArray());
        $dbInstalacion = $this->instalacionRepo->find($instalacion->id);
        $this->assertModelData($fakeInstalacion, $dbInstalacion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_instalacion()
    {
        $instalacion = Instalacion::factory()->create();

        $resp = $this->instalacionRepo->delete($instalacion->id);

        $this->assertTrue($resp);
        $this->assertNull(Instalacion::find($instalacion->id), 'Instalacion should not exist in DB');
    }
}
