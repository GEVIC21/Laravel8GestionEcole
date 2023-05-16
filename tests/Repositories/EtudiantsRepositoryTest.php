<?php namespace Tests\Repositories;

use App\Models\Etudiants;
use App\Repositories\EtudiantsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EtudiantsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EtudiantsRepository
     */
    protected $etudiantsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->etudiantsRepo = \App::make(EtudiantsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_etudiants()
    {
        $etudiants = Etudiants::factory()->make()->toArray();

        $createdEtudiants = $this->etudiantsRepo->create($etudiants);

        $createdEtudiants = $createdEtudiants->toArray();
        $this->assertArrayHasKey('id', $createdEtudiants);
        $this->assertNotNull($createdEtudiants['id'], 'Created Etudiants must have id specified');
        $this->assertNotNull(Etudiants::find($createdEtudiants['id']), 'Etudiants with given id must be in DB');
        $this->assertModelData($etudiants, $createdEtudiants);
    }

    /**
     * @test read
     */
    public function test_read_etudiants()
    {
        $etudiants = Etudiants::factory()->create();

        $dbEtudiants = $this->etudiantsRepo->find($etudiants->id);

        $dbEtudiants = $dbEtudiants->toArray();
        $this->assertModelData($etudiants->toArray(), $dbEtudiants);
    }

    /**
     * @test update
     */
    public function test_update_etudiants()
    {
        $etudiants = Etudiants::factory()->create();
        $fakeEtudiants = Etudiants::factory()->make()->toArray();

        $updatedEtudiants = $this->etudiantsRepo->update($fakeEtudiants, $etudiants->id);

        $this->assertModelData($fakeEtudiants, $updatedEtudiants->toArray());
        $dbEtudiants = $this->etudiantsRepo->find($etudiants->id);
        $this->assertModelData($fakeEtudiants, $dbEtudiants->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_etudiants()
    {
        $etudiants = Etudiants::factory()->create();

        $resp = $this->etudiantsRepo->delete($etudiants->id);

        $this->assertTrue($resp);
        $this->assertNull(Etudiants::find($etudiants->id), 'Etudiants should not exist in DB');
    }
}
