<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEtudiantsAPIRequest;
use App\Http\Requests\API\UpdateEtudiantsAPIRequest;
use App\Models\Etudiants;
use App\Repositories\EtudiantsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EtudiantsController
 * @package App\Http\Controllers\API
 */

class EtudiantsAPIController extends AppBaseController
{
    /** @var  EtudiantsRepository */
    private $etudiantsRepository;

    public function __construct(EtudiantsRepository $etudiantsRepo)
    {
        $this->etudiantsRepository = $etudiantsRepo;
    }

    /**
     * Display a listing of the Etudiants.
     * GET|HEAD /etudiants
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($etudiants->toArray(), 'Etudiants retrieved successfully');
    }

    /**
     * Store a newly created Etudiants in storage.
     * POST /etudiants
     *
     * @param CreateEtudiantsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEtudiantsAPIRequest $request)
    {
        $input = $request->all();

        $etudiants = $this->etudiantsRepository->create($input);

        return $this->sendResponse($etudiants->toArray(), 'Etudiants saved successfully');
    }

    /**
     * Display the specified Etudiants.
     * GET|HEAD /etudiants/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Etudiants $etudiants */
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            return $this->sendError('Etudiants not found');
        }

        return $this->sendResponse($etudiants->toArray(), 'Etudiants retrieved successfully');
    }

    /**
     * Update the specified Etudiants in storage.
     * PUT/PATCH /etudiants/{id}
     *
     * @param int $id
     * @param UpdateEtudiantsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtudiantsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Etudiants $etudiants */
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            return $this->sendError('Etudiants not found');
        }

        $etudiants = $this->etudiantsRepository->update($input, $id);

        return $this->sendResponse($etudiants->toArray(), 'Etudiants updated successfully');
    }

    /**
     * Remove the specified Etudiants from storage.
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
        /** @var Etudiants $etudiants */
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            return $this->sendError('Etudiants not found');
        }

        $etudiants->delete();

        return $this->sendSuccess('Etudiants deleted successfully');
    }
}
