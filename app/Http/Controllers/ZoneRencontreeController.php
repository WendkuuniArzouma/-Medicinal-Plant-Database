<?php

namespace App\Http\Controllers;

use App\DataTables\ZoneRencontreeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateZoneRencontreeRequest;
use App\Http\Requests\UpdateZoneRencontreeRequest;
use App\Repositories\ZoneRencontreeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ZoneRencontreeController extends AppBaseController
{
    /** @var  ZoneRencontreeRepository */
    private $zoneRencontreeRepository;

    public function __construct(ZoneRencontreeRepository $zoneRencontreeRepo)
    {
        $this->zoneRencontreeRepository = $zoneRencontreeRepo;
    }

    /**
     * Display a listing of the ZoneRencontree.
     *
     * @param ZoneRencontreeDataTable $zoneRencontreeDataTable
     * @return Response
     */
    public function index(ZoneRencontreeDataTable $zoneRencontreeDataTable)
    {
        return $zoneRencontreeDataTable->render('zone_rencontrees.index');
    }

    /**
     * Show the form for creating a new ZoneRencontree.
     *
     * @return Response
     */
    public function create()
    {
        return view('zone_rencontrees.create');
    }

    /**
     * Store a newly created ZoneRencontree in storage.
     *
     * @param CreateZoneRencontreeRequest $request
     *
     * @return Response
     */
    public function store(CreateZoneRencontreeRequest $request)
    {
        $input = $request->all();

        $zoneRencontree = $this->zoneRencontreeRepository->create($input);

        Flash::success('Zone Rencontree saved successfully.');

        return redirect(route('zoneRencontrees.index'));
    }

    /**
     * Display the specified ZoneRencontree.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zoneRencontree = $this->zoneRencontreeRepository->find($id);

        if (empty($zoneRencontree)) {
            Flash::error('Zone Rencontree not found');

            return redirect(route('zoneRencontrees.index'));
        }

        return view('zone_rencontrees.show')->with('zoneRencontree', $zoneRencontree);
    }

    /**
     * Show the form for editing the specified ZoneRencontree.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zoneRencontree = $this->zoneRencontreeRepository->find($id);

        if (empty($zoneRencontree)) {
            Flash::error('Zone Rencontree not found');

            return redirect(route('zoneRencontrees.index'));
        }

        return view('zone_rencontrees.edit')->with('zoneRencontree', $zoneRencontree);
    }

    /**
     * Update the specified ZoneRencontree in storage.
     *
     * @param  int              $id
     * @param UpdateZoneRencontreeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZoneRencontreeRequest $request)
    {
        $zoneRencontree = $this->zoneRencontreeRepository->find($id);

        if (empty($zoneRencontree)) {
            Flash::error('Zone Rencontree not found');

            return redirect(route('zoneRencontrees.index'));
        }

        $zoneRencontree = $this->zoneRencontreeRepository->update($request->all(), $id);

        Flash::success('Zone Rencontree updated successfully.');

        return redirect(route('zoneRencontrees.index'));
    }

    /**
     * Remove the specified ZoneRencontree from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zoneRencontree = $this->zoneRencontreeRepository->find($id);

        if (empty($zoneRencontree)) {
            Flash::error('Zone Rencontree not found');

            return redirect(route('zoneRencontrees.index'));
        }

        $this->zoneRencontreeRepository->delete($id);

        Flash::success('Zone Rencontree deleted successfully.');

        return redirect(route('zoneRencontrees.index'));
    }
}
