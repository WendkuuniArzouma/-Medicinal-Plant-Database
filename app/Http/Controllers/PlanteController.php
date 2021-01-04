<?php

namespace App\Http\Controllers;

use App\DataTables\PlanteDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePlanteRequest;
use App\Http\Requests\UpdatePlanteRequest;
use App\Repositories\PlanteRepository;
use App\Repositories\ZoneRencontreeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Traits\ImageUpload;
use Illuminate\Support\Str;

class PlanteController extends AppBaseController
{

    /** @var  PlanteRepository */
    private $planteRepository;
    private $zoneRepository;
    use ImageUpload;

    public function __construct(PlanteRepository $planteRepo, ZoneRencontreeRepository $zoneRencontreeRepo)
    {
        $this->planteRepository = $planteRepo;
         $this->zoneRencontreeRepository = $zoneRencontreeRepo;
    }

    /**
     * Display a listing of the Plante.
     *
     * @param PlanteDataTable $planteDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $plantes = $this->planteRepository->all();
        return view('plantes.index')->with('plantes',$plantes);
    }

    /**
     * Show the form for creating a new Plante.
     *
     * @return Response
     */
    public function create()
    {
        $zoneRencontrees = $this->zoneRencontreeRepository->all();
        return view('plantes.create')->with('zoneRencontrees',$zoneRencontrees);
    }

    //use ImageUpload; //Using our created Trait to access inside trait method
    /**
     * Store a newly created Plante in storage.
     *
     * @param CreatePlanteRequest $request
     *
     * @return Response
     */
    public function store(CreatePlanteRequest $request)
    {
        $input = $request->all();

        // Check if a profile image has been uploaded
        if ($request->has('photo')) {
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $input["photo"] = $filePath;
        }

        $plante = $this->planteRepository->create($input);
        foreach ($request->all('zoneRencontrees') as $zone_id){
            //$zone = $this->zoneRencontreeRepository->find($zone_id);
            $plante->zoneRencontrees()->attach($zone_id);
            
        }

        /*($requete->all('zoneRencontrees') as $zone_id) {
        $plante->zoneRencontrees()->attach($zone_id);
        }*/

        Flash::success('Plante saved successfully.');

        return redirect(route('plantes.index'));
    }

    /**
     * Display the specified Plante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $plante = $this->planteRepository->find($id);

        if (empty($plante)) {
            Flash::error('Plante not found');

            return redirect(route('plantes.index'));
        }

        return view('plantes.show')->with('plante', $plante);
    }

    /**
     * Show the form for editing the specified Plante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $plante = $this->planteRepository->find($id);
        $zoneRencontrees = $this->zoneRencontreeRepository->all();

        if (empty($plante)) {
            Flash::error('Plante not found');

            return redirect(route('plantes.index'));
        }

        return view('plantes.edit')->with('plante', $plante)->with('zoneRencontrees',$zoneRencontrees);
    }

    /**
     * Update the specified Plante in storage.
     *
     * @param  int              $id
     * @param UpdatePlanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlanteRequest $request)
    {
        $plante = $this->planteRepository->find($id);

        if (empty($plante)) {
            Flash::error('Plante not found');

            return redirect(route('plantes.index'));
        }
        $input = $request->all();

        // Check if a profile image has been uploaded
        if ($request->has('photo')) {
            // Get image file
            $image = $request->file('photo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug('_'.time());
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $input["photo"] = $filePath;
        }

        $plante = $this->planteRepository->update($input, $id);
   
        //$plante->zoneRencontrees()->detach();
        
        foreach ($request->all('zoneRencontrees') as $zone_id){
            //$zone = $this->zoneRencontreeRepository->find($zone_id);
            $plante->zoneRencontrees()->attach($zone_id);
            
        }

        Flash::success('Plante updated successfully.');

        return redirect(route('plantes.index'));
    }

    /**
     * Remove the specified Plante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $plante = $this->planteRepository->find($id);

        if (empty($plante)) {
            Flash::error('Plante not found');

            return redirect(route('plantes.index'));
        }

        $this->planteRepository->delete($id);

        Flash::success('Plante deleted successfully.');

        return redirect(route('plantes.index'));
    }

}
