<?php namespace Tests\Repositories;

use App\Models\Profesional;
use App\Repositories\ProfesionalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProfesionalRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProfesionalRepository
     */
    protected $profesionalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->profesionalRepo = \App::make(ProfesionalRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_profesional()
    {
        $profesional = Profesional::factory()->make()->toArray();

        $createdProfesional = $this->profesionalRepo->create($profesional);

        $createdProfesional = $createdProfesional->toArray();
        $this->assertArrayHasKey('id', $createdProfesional);
        $this->assertNotNull($createdProfesional['id'], 'Created Profesional must have id specified');
        $this->assertNotNull(Profesional::find($createdProfesional['id']), 'Profesional with given id must be in DB');
        $this->assertModelData($profesional, $createdProfesional);
    }

    /**
     * @test read
     */
    public function test_read_profesional()
    {
        $profesional = Profesional::factory()->create();

        $dbProfesional = $this->profesionalRepo->find($profesional->id);

        $dbProfesional = $dbProfesional->toArray();
        $this->assertModelData($profesional->toArray(), $dbProfesional);
    }

    /**
     * @test update
     */
    public function test_update_profesional()
    {
        $profesional = Profesional::factory()->create();
        $fakeProfesional = Profesional::factory()->make()->toArray();

        $updatedProfesional = $this->profesionalRepo->update($fakeProfesional, $profesional->id);

        $this->assertModelData($fakeProfesional, $updatedProfesional->toArray());
        $dbProfesional = $this->profesionalRepo->find($profesional->id);
        $this->assertModelData($fakeProfesional, $dbProfesional->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_profesional()
    {
        $profesional = Profesional::factory()->create();

        $resp = $this->profesionalRepo->delete($profesional->id);

        $this->assertTrue($resp);
        $this->assertNull(Profesional::find($profesional->id), 'Profesional should not exist in DB');
    }
}
