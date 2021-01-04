<?php

namespace App\Http\Controllers;

use App\DataTables\RegionPratiqueeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRegionPratiqueeRequest;
use App\Http\Requests\UpdateRegionPratiqueeRequest;
use App\Repositories\RegionPratiqueeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RegionPratiqueeController extends AppBaseController
{
    /** @var  RegionPratiqueeRepository */
    private $regionPratiqueeRepository;

    public function __construct(RegionPratiqueeRepository $regionPratiqueeRepo)
    {
        $this->regionPratiqueeRepository = $regionPratiqueeRepo;
    }

    /**
     * Display a listing of the RegionPratiquee.
     *
     * @param RegionPratiqueeDataTable $regionPratiqueeDataTable
     * @return Response
     */
    public function index(RegionPratiqueeDataTable $regionPratiqueeDataTable)
    {
        return $regionPratiqueeDataTable->render('region_pratiquees.index');
    }

    /**
     * Show the form for creating a new RegionPratiquee.
     *
     * @return Response
     */
    public function create()
    {
        return view('region_pratiquees.create');
    }

    /**
     * Store a newly created RegionPratiquee in storage.
     *
     * @param CreateRegionPratiqueeRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionPratiqueeRequest $request)
    {
        $input = $request->all();

        $regionPratiquee = $this->regionPratiqueeRepository->create($input);

        Flash::success('Region Pratiquee saved successfully.');

        return redirect(route('regionPratiquees.index'));
    }

    /**
     * Display the specified RegionPratiquee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regionPratiquee = $this->regionPratiqueeRepository->find($id);

        if (empty($regionPratiquee)) {
            Flash::error('Region Pratiquee not found');

            return redirect(route('regionPratiquees.index'));
        }

        return view('region_pratiquees.show')->with('regionPratiquee', $regionPratiquee);
    }

    /**
     * Show the form for editing the specified RegionPratiquee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regionPratiquee = $this->regionPratiqueeRepository->find($id);

        if (empty($regionPratiquee)) {
            Flash::error('Region Pratiquee not found');

            return redirect(route('regionPratiquees.index'));
        }

        return view('region_pratiquees.edit')->with('regionPratiquee', $regionPratiquee);
    }

    /**
     * Update the specified RegionPratiquee in storage.
     *
     * @param  int              $id
     * @param UpdateRegionPratiqueeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionPratiqueeRequest $request)
    {
        $regionPratiquee = $this->regionPratiqueeRepository->find($id);

        if (empty($regionPratiquee)) {
            Flash::error('Region Pratiquee not found');

            return redirect(route('regionPratiquees.index'));
        }

        $regionPratiquee = $this->regionPratiqueeRepository->update($request->all(), $id);

        Flash::success('Region Pratiquee updated successfully.');

        return redirect(route('regionPratiquees.index'));
    }

    /**
     * Remove the specified RegionPratiquee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regionPratiquee = $this->regionPratiqueeRepository->find($id);

        if (empty($regionPratiquee)) {
            Flash::error('Region Pratiquee not found');

            return redirect(route('regionPratiquees.index'));
        }

        $this->regionPratiqueeRepository->delete($id);

        Flash::success('Region Pratiquee deleted successfully.');

        return redirect(route('regionPratiquees.index'));
    }
}
