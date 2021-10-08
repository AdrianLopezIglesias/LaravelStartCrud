<?php namespace Tests\Repositories;

use App\Models\Pacientes;
use App\Repositories\PacientesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PacientesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PacientesRepository
     */
    protected $pacientesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pacientesRepo = \App::make(PacientesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pacientes()
    {
        $pacientes = Pacientes::factory()->make()->toArray();

        $createdPacientes = $this->pacientesRepo->create($pacientes);

        $createdPacientes = $createdPacientes->toArray();
        $this->assertArrayHasKey('id', $createdPacientes);
        $this->assertNotNull($createdPacientes['id'], 'Created Pacientes must have id specified');
        $this->assertNotNull(Pacientes::find($createdPacientes['id']), 'Pacientes with given id must be in DB');
        $this->assertModelData($pacientes, $createdPacientes);
    }

    /**
     * @test read
     */
    public function test_read_pacientes()
    {
        $pacientes = Pacientes::factory()->create();

        $dbPacientes = $this->pacientesRepo->find($pacientes->id);

        $dbPacientes = $dbPacientes->toArray();
        $this->assertModelData($pacientes->toArray(), $dbPacientes);
    }

    /**
     * @test update
     */
    public function test_update_pacientes()
    {
        $pacientes = Pacientes::factory()->create();
        $fakePacientes = Pacientes::factory()->make()->toArray();

        $updatedPacientes = $this->pacientesRepo->update($fakePacientes, $pacientes->id);

        $this->assertModelData($fakePacientes, $updatedPacientes->toArray());
        $dbPacientes = $this->pacientesRepo->find($pacientes->id);
        $this->assertModelData($fakePacientes, $dbPacientes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pacientes()
    {
        $pacientes = Pacientes::factory()->create();

        $resp = $this->pacientesRepo->delete($pacientes->id);

        $this->assertTrue($resp);
        $this->assertNull(Pacientes::find($pacientes->id), 'Pacientes should not exist in DB');
    }
}
