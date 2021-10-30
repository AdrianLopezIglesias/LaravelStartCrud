<?php namespace Tests\Repositories;

use App\Models\PacienteDatosPersonales;
use App\Repositories\PacienteDatosPersonalesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PacienteDatosPersonalesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PacienteDatosPersonalesRepository
     */
    protected $pacienteDatosPersonalesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pacienteDatosPersonalesRepo = \App::make(PacienteDatosPersonalesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->make()->toArray();

        $createdPacienteDatosPersonales = $this->pacienteDatosPersonalesRepo->create($pacienteDatosPersonales);

        $createdPacienteDatosPersonales = $createdPacienteDatosPersonales->toArray();
        $this->assertArrayHasKey('id', $createdPacienteDatosPersonales);
        $this->assertNotNull($createdPacienteDatosPersonales['id'], 'Created PacienteDatosPersonales must have id specified');
        $this->assertNotNull(PacienteDatosPersonales::find($createdPacienteDatosPersonales['id']), 'PacienteDatosPersonales with given id must be in DB');
        $this->assertModelData($pacienteDatosPersonales, $createdPacienteDatosPersonales);
    }

    /**
     * @test read
     */
    public function test_read_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();

        $dbPacienteDatosPersonales = $this->pacienteDatosPersonalesRepo->find($pacienteDatosPersonales->id);

        $dbPacienteDatosPersonales = $dbPacienteDatosPersonales->toArray();
        $this->assertModelData($pacienteDatosPersonales->toArray(), $dbPacienteDatosPersonales);
    }

    /**
     * @test update
     */
    public function test_update_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();
        $fakePacienteDatosPersonales = PacienteDatosPersonales::factory()->make()->toArray();

        $updatedPacienteDatosPersonales = $this->pacienteDatosPersonalesRepo->update($fakePacienteDatosPersonales, $pacienteDatosPersonales->id);

        $this->assertModelData($fakePacienteDatosPersonales, $updatedPacienteDatosPersonales->toArray());
        $dbPacienteDatosPersonales = $this->pacienteDatosPersonalesRepo->find($pacienteDatosPersonales->id);
        $this->assertModelData($fakePacienteDatosPersonales, $dbPacienteDatosPersonales->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_paciente_datos_personales()
    {
        $pacienteDatosPersonales = PacienteDatosPersonales::factory()->create();

        $resp = $this->pacienteDatosPersonalesRepo->delete($pacienteDatosPersonales->id);

        $this->assertTrue($resp);
        $this->assertNull(PacienteDatosPersonales::find($pacienteDatosPersonales->id), 'PacienteDatosPersonales should not exist in DB');
    }
}
