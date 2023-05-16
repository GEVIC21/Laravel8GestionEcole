<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtudiantsRequest;
use App\Http\Requests\UpdateEtudiantsRequest;
use App\Repositories\EtudiantsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EtudiantsController extends AppBaseController
{
    /** @var EtudiantsRepository $etudiantsRepository*/
    private $etudiantsRepository;

    public function __construct(EtudiantsRepository $etudiantsRepo)
    {
        $this->etudiantsRepository = $etudiantsRepo;
    }

    /**
     * Display a listing of the Etudiants.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantsRepository->all();

        return view('etudiants.index')
            ->with('etudiants', $etudiants);
    }

    /**
     * Show the form for creating a new Etudiants.
     *
     * @return Response
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created Etudiants in storage.
     *
     * @param CreateEtudiantsRequest $request
     *
     * @return Response
     */
    public function store(CreateEtudiantsRequest $request)
    {
        $input = $request->all();

        $etudiants = $this->etudiantsRepository->create($input);

        Flash::success('Etudiants saved successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Display the specified Etudiants.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            Flash::error('Etudiants not found');

            return redirect(route('etudiants.index'));
        }

        return view('etudiants.show')->with('etudiants', $etudiants);
    }

    /**
     * Show the form for editing the specified Etudiants.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            Flash::error('Etudiants not found');

            return redirect(route('etudiants.index'));
        }

        return view('etudiants.edit')->with('etudiants', $etudiants);
    }

    /**
     * Update the specified Etudiants in storage.
     *
     * @param int $id
     * @param UpdateEtudiantsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtudiantsRequest $request)
    {
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            Flash::error('Etudiants not found');

            return redirect(route('etudiants.index'));
        }

        $etudiants = $this->etudiantsRepository->update($request->all(), $id);

        Flash::success('Etudiants updated successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Remove the specified Etudiants from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etudiants = $this->etudiantsRepository->find($id);

        if (empty($etudiants)) {
            Flash::error('Etudiants not found');

            return redirect(route('etudiants.index'));
        }

        $this->etudiantsRepository->delete($id);

        Flash::success('Etudiants deleted successfully.');

        return redirect(route('etudiants.index'));
    }
}
