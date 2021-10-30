<?php namespace Tests\Repositories;

use App\Models\ProfesionalHorario;
use App\Repositories\ProfesionalHorarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProfesionalHorarioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfesionalHorarioRepository
     */
    protected $profesionalHorarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->profesionalHorarioRepo = \App::make(ProfesionalHorarioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->make()->toArray();

        $createdProfesionalHorario = $this->profesionalHorarioRepo->create($profesionalHorario);

        $createdProfesionalHorario = $createdProfesionalHorario->toArray();
        $this->assertArrayHasKey('id', $createdProfesionalHorario);
        $this->assertNotNull($createdProfesionalHorario['id'], 'Created ProfesionalHorario must have id specified');
        $this->assertNotNull(ProfesionalHorario::find($createdProfesionalHorario['id']), 'ProfesionalHorario with given id must be in DB');
        $this->assertModelData($profesionalHorario, $createdProfesionalHorario);
    }

    /**
     * @test read
     */
    public function test_read_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();

        $dbProfesionalHorario = $this->profesionalHorarioRepo->find($profesionalHorario->id);

        $dbProfesionalHorario = $dbProfesionalHorario->toArray();
        $this->assertModelData($profesionalHorario->toArray(), $dbProfesionalHorario);
    }

    /**
     * @test update
     */
    public function test_update_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();
        $fakeProfesionalHorario = ProfesionalHorario::factory()->make()->toArray();

        $updatedProfesionalHorario = $this->profesionalHorarioRepo->update($fakeProfesionalHorario, $profesionalHorario->id);

        $this->assertModelData($fakeProfesionalHorario, $updatedProfesionalHorario->toArray());
        $dbProfesionalHorario = $this->profesionalHorarioRepo->find($profesionalHorario->id);
        $this->assertModelData($fakeProfesionalHorario, $dbProfesionalHorario->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_profesional_horario()
    {
        $profesionalHorario = ProfesionalHorario::factory()->create();

        $resp = $this->profesionalHorarioRepo->delete($profesionalHorario->id);

        $this->assertTrue($resp);
        $this->assertNull(ProfesionalHorario::find($profesionalHorario->id), 'ProfesionalHorario should not exist in DB');
    }
}
