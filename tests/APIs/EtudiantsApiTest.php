<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Etudiants;

class EtudiantsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_etudiants()
    {
        $etudiants = Etudiants::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/etudiants', $etudiants
        );

        $this->assertApiResponse($etudiants);
    }

    /**
     * @test
     */
    public function test_read_etudiants()
    {
        $etudiants = Etudiants::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/etudiants/'.$etudiants->id
        );

        $this->assertApiResponse($etudiants->toArray());
    }

    /**
     * @test
     */
    public function test_update_etudiants()
    {
        $etudiants = Etudiants::factory()->create();
        $editedEtudiants = Etudiants::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/etudiants/'.$etudiants->id,
            $editedEtudiants
        );

        $this->assertApiResponse($editedEtudiants);
    }

    /**
     * @test
     */
    public function test_delete_etudiants()
    {
        $etudiants = Etudiants::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/etudiants/'.$etudiants->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/etudiants/'.$etudiants->id
        );

        $this->response->assertStatus(404);
    }
}
