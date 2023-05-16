<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Repositories\EtudiantRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EtudiantController extends AppBaseController
{
    /** @var EtudiantRepository $etudiantRepository*/
    private $etudiantRepository;

    public function __construct(EtudiantRepository $etudiantRepo)
    {
        $this->etudiantRepository = $etudiantRepo;
    }

    /**
     * Display a listing of the Etudiant.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $etudiants = $this->etudiantRepository->all();

        return view('etudiants.index')
            ->with('etudiants', $etudiants);
    }

    /**
     * Show the form for creating a new Etudiant.
     *
     * @return Response
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created Etudiant in storage.
     *
     * @param CreateEtudiantRequest $request
     *
     * @return Response
     */
    public function store(CreateEtudiantRequest $request)
    {
        $input = $request->all();

        $etudiant = $this->etudiantRepository->create($input);

        Flash::success('Etudiant saved successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Display the specified Etudiant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        return view('etudiants.show')->with('etudiant', $etudiant);
    }

    /**
     * Show the form for editing the specified Etudiant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        return view('etudiants.edit')->with('etudiant', $etudiant);
    }

    /**
     * Update the specified Etudiant in storage.
     *
     * @param int $id
     * @param UpdateEtudiantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtudiantRequest $request)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        $etudiant = $this->etudiantRepository->update($request->all(), $id);

        Flash::success('Etudiant updated successfully.');

        return redirect(route('etudiants.index'));
    }

    /**
     * Remove the specified Etudiant from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etudiant = $this->etudiantRepository->find($id);

        if (empty($etudiant)) {
            Flash::error('Etudiant not found');

            return redirect(route('etudiants.index'));
        }

        $this->etudiantRepository->delete($id);

        Flash::success('Etudiant deleted successfully.');

        return redirect(route('etudiants.index'));
    }
}
