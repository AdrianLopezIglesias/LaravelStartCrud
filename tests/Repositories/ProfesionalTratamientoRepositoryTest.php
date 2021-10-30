<?php namespace Tests\Repositories;

use App\Models\ProfesionalTratamiento;
use App\Repositories\ProfesionalTratamientoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProfesionalTratamientoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfesionalTratamientoRepository
     */
    protected $profesionalTratamientoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->profesionalTratamientoRepo = \App::make(ProfesionalTratamientoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->make()->toArray();

        $createdProfesionalTratamiento = $this->profesionalTratamientoRepo->create($profesionalTratamiento);

        $createdProfesionalTratamiento = $createdProfesionalTratamiento->toArray();
        $this->assertArrayHasKey('id', $createdProfesionalTratamiento);
        $this->assertNotNull($createdProfesionalTratamiento['id'], 'Created ProfesionalTratamiento must have id specified');
        $this->assertNotNull(ProfesionalTratamiento::find($createdProfesionalTratamiento['id']), 'ProfesionalTratamiento with given id must be in DB');
        $this->assertModelData($profesionalTratamiento, $createdProfesionalTratamiento);
    }

    /**
     * @test read
     */
    public function test_read_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();

        $dbProfesionalTratamiento = $this->profesionalTratamientoRepo->find($profesionalTratamiento->id);

        $dbProfesionalTratamiento = $dbProfesionalTratamiento->toArray();
        $this->assertModelData($profesionalTratamiento->toArray(), $dbProfesionalTratamiento);
    }

    /**
     * @test update
     */
    public function test_update_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();
        $fakeProfesionalTratamiento = ProfesionalTratamiento::factory()->make()->toArray();

        $updatedProfesionalTratamiento = $this->profesionalTratamientoRepo->update($fakeProfesionalTratamiento, $profesionalTratamiento->id);

        $this->assertModelData($fakeProfesionalTratamiento, $updatedProfesionalTratamiento->toArray());
        $dbProfesionalTratamiento = $this->profesionalTratamientoRepo->find($profesionalTratamiento->id);
        $this->assertModelData($fakeProfesionalTratamiento, $dbProfesionalTratamiento->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_profesional_tratamiento()
    {
        $profesionalTratamiento = ProfesionalTratamiento::factory()->create();

        $resp = $this->profesionalTratamientoRepo->delete($profesionalTratamiento->id);

        $this->assertTrue($resp);
        $this->assertNull(ProfesionalTratamiento::find($profesionalTratamiento->id), 'ProfesionalTratamiento should not exist in DB');
    }
}
