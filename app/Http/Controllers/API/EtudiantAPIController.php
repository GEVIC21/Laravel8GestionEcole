<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtudiantAPIRequest;
use App\Http\Requests\API\UpdateEtudiantAPIRequest;
use App\Models\Etudiant;
use App\Repositories\EtudiantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EtudiantController
 * @package App\Http\Controllers\API
 */

class EtudiantAPIController extends AppBaseController
{
    /** @var  EtudiantRepository */
    private $etudiantRepository;

    public function __construct(EtudiantRepository $etudiantRepo)
    {
        $this->etudiantRepository = $etudiantRepo;
    }

    /**
     * Display a listing of the Etudiant.
     * GET|HEAD /etudiants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etudiants->toArray(), 'Etudiants retrieved successfully');
    }

    /**
     * Store a newly created Etudiant in storage.
     * POST /etudiants
     *
     * @param CreateEtudiantAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEtudiantAPIRequest $request)
    {
        $input = $request->all();

        $etudiant = $this->etudiantRepository->create($input);

        return $this->sendResponse($etudiant->toArray(), 'Etudiant saved successfully');
    }

    /**
     * Display the specified Etudiant.
     * GET|HEAD /etudiants/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        return $this->sendResponse($etudiant->toArray(), 'Etudiant retrieved successfully');
    }

    /**
     * Update the specified Etudiant in storage.
     * PUT/PATCH /etudiants/{id}
     *
     * @param int $id
     * @param UpdateEtudiantAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtudiantAPIRequest $request)
    {
        $input = $request->all();

        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        $etudiant = $this->etudiantRepository->update($input, $id);

        return $this->sendResponse($etudiant->toArray(), 'Etudiant updated successfully');
    }

    /**
     * Remove the specified Etudiant from storage.
     * DELETE /etudiants/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Etudiant $etudiant */
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            return $this->sendError('Etudiant not found');
        }

        $etudiant->delete();

        return $this->sendSuccess('Etudiant deleted successfully');
    }
}
