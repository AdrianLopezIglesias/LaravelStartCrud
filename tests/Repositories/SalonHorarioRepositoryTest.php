<?php namespace Tests\Repositories;

use App\Models\SalonHorario;
use App\Repositories\SalonHorarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SalonHorarioRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalonHorarioRepository
     */
    protected $salonHorarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->salonHorarioRepo = \App::make(SalonHorarioRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->make()->toArray();

        $createdSalonHorario = $this->salonHorarioRepo->create($salonHorario);

        $createdSalonHorario = $createdSalonHorario->toArray();
        $this->assertArrayHasKey('id', $createdSalonHorario);
        $this->assertNotNull($createdSalonHorario['id'], 'Created SalonHorario must have id specified');
        $this->assertNotNull(SalonHorario::find($createdSalonHorario['id']), 'SalonHorario with given id must be in DB');
        $this->assertModelData($salonHorario, $createdSalonHorario);
    }

    /**
     * @test read
     */
    public function test_read_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();

        $dbSalonHorario = $this->salonHorarioRepo->find($salonHorario->id);

        $dbSalonHorario = $dbSalonHorario->toArray();
        $this->assertModelData($salonHorario->toArray(), $dbSalonHorario);
    }

    /**
     * @test update
     */
    public function test_update_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();
        $fakeSalonHorario = SalonHorario::factory()->make()->toArray();

        $updatedSalonHorario = $this->salonHorarioRepo->update($fakeSalonHorario, $salonHorario->id);

        $this->assertModelData($fakeSalonHorario, $updatedSalonHorario->toArray());
        $dbSalonHorario = $this->salonHorarioRepo->find($salonHorario->id);
        $this->assertModelData($fakeSalonHorario, $dbSalonHorario->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_salon_horario()
    {
        $salonHorario = SalonHorario::factory()->create();

        $resp = $this->salonHorarioRepo->delete($salonHorario->id);

        $this->assertTrue($resp);
        $this->assertNull(SalonHorario::find($salonHorario->id), 'SalonHorario should not exist in DB');
    }
}
