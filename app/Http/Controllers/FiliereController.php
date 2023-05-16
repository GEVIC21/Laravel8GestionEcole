<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;
use App\Repositories\FiliereRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FiliereController extends AppBaseController
{
    /** @var FiliereRepository $filiereRepository*/
    private $filiereRepository;

    public function __construct(FiliereRepository $filiereRepo)
    {
        $this->filiereRepository = $filiereRepo;
    }

    /**
     * Display a listing of the Filiere.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filieres = $this->filiereRepository->all();

        return view('filieres.index')
            ->with('filieres', $filieres);
    }

    /**
     * Show the form for creating a new Filiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created Filiere in storage.
     *
     * @param CreateFiliereRequest $request
     *
     * @return Response
     */
    public function store(CreateFiliereRequest $request)
    {
        $input = $request->all();

        $filiere = $this->filiereRepository->create($input);

        Flash::success('Filiere saved successfully.');

        return redirect(route('filieres.index'));
    }

    /**
     * Display the specified Filiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        return view('filieres.show')->with('filiere', $filiere);
    }

    /**
     * Show the form for editing the specified Filiere.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        return view('filieres.edit')->with('filiere', $filiere);
    }

    /**
     * Update the specified Filiere in storage.
     *
     * @param int $id
     * @param UpdateFiliereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFiliereRequest $request)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        $filiere = $this->filiereRepository->update($request->all(), $id);

        Flash::success('Filiere updated successfully.');

        return redirect(route('filieres.index'));
    }

    /**
     * Remove the specified Filiere from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        $this->filiereRepository->delete($id);

        Flash::success('Filiere deleted successfully.');

        return redirect(route('filieres.index'));
    }
}
