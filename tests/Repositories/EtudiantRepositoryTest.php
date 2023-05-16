<?php namespace Tests\Repositories;

use App\Models\Etudiant;
use App\Repositories\EtudiantRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EtudiantRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EtudiantRepository
     */
    protected $etudiantRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->etudiantRepo = \App::make(EtudiantRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_etudiant()
    {
        $etudiant = Etudiant::factory()->make()->toArray();

        $createdEtudiant = $this->etudiantRepo->create($etudiant);

        $createdEtudiant = $createdEtudiant->toArray();
        $this->assertArrayHasKey('id', $createdEtudiant);
        $this->assertNotNull($createdEtudiant['id'], 'Created Etudiant must have id specified');
        $this->assertNotNull(Etudiant::find($createdEtudiant['id']), 'Etudiant with given id must be in DB');
        $this->assertModelData($etudiant, $createdEtudiant);
    }

    /**
     * @test read
     */
    public function test_read_etudiant()
    {
        $etudiant = Etudiant::factory()->create();

        $dbEtudiant = $this->etudiantRepo->find($etudiant->id);

        $dbEtudiant = $dbEtudiant->toArray();
        $this->assertModelData($etudiant->toArray(), $dbEtudiant);
    }

    /**
     * @test update
     */
    public function test_update_etudiant()
    {
        $etudiant = Etudiant::factory()->create();
        $fakeEtudiant = Etudiant::factory()->make()->toArray();

        $updatedEtudiant = $this->etudiantRepo->update($fakeEtudiant, $etudiant->id);

        $this->assertModelData($fakeEtudiant, $updatedEtudiant->toArray());
        $dbEtudiant = $this->etudiantRepo->find($etudiant->id);
        $this->assertModelData($fakeEtudiant, $dbEtudiant->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_etudiant()
    {
        $etudiant = Etudiant::factory()->create();

        $resp = $this->etudiantRepo->delete($etudiant->id);

        $this->assertTrue($resp);
        $this->assertNull(Etudiant::find($etudiant->id), 'Etudiant should not exist in DB');
    }
}
