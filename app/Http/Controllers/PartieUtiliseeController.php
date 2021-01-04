<?php

namespace App\Http\Controllers;

use App\DataTables\PartieUtiliseeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePartieUtiliseeRequest;
use App\Http\Requests\UpdatePartieUtiliseeRequest;
use App\Repositories\PartieUtiliseeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PartieUtiliseeController extends AppBaseController
{
    /** @var  PartieUtiliseeRepository */
    private $partieUtiliseeRepository;

    public function __construct(PartieUtiliseeRepository $partieUtiliseeRepo)
    {
        $this->partieUtiliseeRepository = $partieUtiliseeRepo;
    }

    /**
     * Display a listing of the PartieUtilisee.
     *
     * @param PartieUtiliseeDataTable $partieUtiliseeDataTable
     * @return Response
     */
    public function index(PartieUtiliseeDataTable $partieUtiliseeDataTable)
    {
        return $partieUtiliseeDataTable->render('partie_utilisees.index');
    }

    /**
     * Show the form for creating a new PartieUtilisee.
     *
     * @return Response
     */
    public function create()
    {
        return view('partie_utilisees.create');
    }

    /**
     * Store a newly created PartieUtilisee in storage.
     *
     * @param CreatePartieUtiliseeRequest $request
     *
     * @return Response
     */
    public function store(CreatePartieUtiliseeRequest $request)
    {
        $input = $request->all();

        $partieUtilisee = $this->partieUtiliseeRepository->create($input);

        Flash::success('Partie Utilisee saved successfully.');

        return redirect(route('partieUtilisees.index'));
    }

    /**
     * Display the specified PartieUtilisee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $partieUtilisee = $this->partieUtiliseeRepository->find($id);

        if (empty($partieUtilisee)) {
            Flash::error('Partie Utilisee not found');

            return redirect(route('partieUtilisees.index'));
        }

        return view('partie_utilisees.show')->with('partieUtilisee', $partieUtilisee);
    }

    /**
     * Show the form for editing the specified PartieUtilisee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $partieUtilisee = $this->partieUtiliseeRepository->find($id);

        if (empty($partieUtilisee)) {
            Flash::error('Partie Utilisee not found');

            return redirect(route('partieUtilisees.index'));
        }

        return view('partie_utilisees.edit')->with('partieUtilisee', $partieUtilisee);
    }

    /**
     * Update the specified PartieUtilisee in storage.
     *
     * @param  int              $id
     * @param UpdatePartieUtiliseeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePartieUtiliseeRequest $request)
    {
        $partieUtilisee = $this->partieUtiliseeRepository->find($id);

        if (empty($partieUtilisee)) {
            Flash::error('Partie Utilisee not found');

            return redirect(route('partieUtilisees.index'));
        }

        $partieUtilisee = $this->partieUtiliseeRepository->update($request->all(), $id);

        Flash::success('Partie Utilisee updated successfully.');

        return redirect(route('partieUtilisees.index'));
    }

    /**
     * Remove the specified PartieUtilisee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $partieUtilisee = $this->partieUtiliseeRepository->find($id);

        if (empty($partieUtilisee)) {
            Flash::error('Partie Utilisee not found');

            return redirect(route('partieUtilisees.index'));
        }

        $this->partieUtiliseeRepository->delete($id);

        Flash::success('Partie Utilisee deleted successfully.');

        return redirect(route('partieUtilisees.index'));
    }
}
