<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Etudiant;

class EtudiantApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_etudiant()
    {
        $etudiant = Etudiant::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/etudiants', $etudiant
        );

        $this->assertApiResponse($etudiant);
    }

    /**
     * @test
     */
    public function test_read_etudiant()
    {
        $etudiant = Etudiant::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/etudiants/'.$etudiant->id
        );

        $this->assertApiResponse($etudiant->toArray());
    }

    /**
     * @test
     */
    public function test_update_etudiant()
    {
        $etudiant = Etudiant::factory()->create();
        $editedEtudiant = Etudiant::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/etudiants/'.$etudiant->id,
            $editedEtudiant
        );

        $this->assertApiResponse($editedEtudiant);
    }

    /**
     * @test
     */
    public function test_delete_etudiant()
    {
        $etudiant = Etudiant::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/etudiants/'.$etudiant->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/etudiants/'.$etudiant->id
        );

        $this->response->assertStatus(404);
    }
}
