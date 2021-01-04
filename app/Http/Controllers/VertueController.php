<?php

namespace App\Http\Controllers;

use App\Models\Vertue;
use App\Models\Plante;
use App\Models\ZoneRencontree;
use App\Models\RegionPratiquee;
use App\Models\PartieUtilisee;
use App\DataTables\VertueDataTable;
use App\Http\Requests\CreateVertueRequest;
use App\Http\Requests\UpdateVertueRequest;
use App\Repositories\VertueRepository;
use App\Repositories\PlanteRepository;
use App\Repositories\RegionPratiqueeRepository;
use App\Repositories\PartieUtiliseeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Elasticsearch\ClientBuilder;
use IlluminateDatabaseEloquentCollection;
use Illuminate\Http\Request;


use App\Events\NewVertueEvent;



    class VertueController extends AppBaseController
    {
        /** @var  VertueRepository */
        private $vertueRepository;
        private $planteRepository;
        private $regionPratiqueeRepository;
        private $partieUtiliseeRepository;


        //Modification 04/05/2020
        protected $client;
        //Fin modifications

        public function __construct(VertueRepository $vertueRepo, RegionPratiqueeRepository $regionPratiqueeRepo,  PartieUtiliseeRepository $partieUtiliseeRepo, PlanteRepository $planteRepo)
        {
            $this->vertueRepository = $vertueRepo;
            $this->regionPratiqueeRepository = $regionPratiqueeRepo;
            $this->partieUtiliseeRepository = $partieUtiliseeRepo;
            $this->planteRepository = $planteRepo;

            //Ajouter 04/05/2020
            $this->client = ClientBuilder::create()->build();
            //Fin modifications
           
        }

        /**
         * Display a listing of the Vertue.
         *
         * @param VertueDataTable $vertueDataTable
         * @return Response
         */
        public function index(VertueDataTable $vertueDataTable)
        {
            /*$vertues = Vertue::with('partieutilisee')->get();
            $vertues = Vertue::with('regionpratiquee')->get();
            $vertues = Vertue::with('plante')->get();*/
            return $vertueDataTable->render('vertues.index');
        }

        /**
         * Show the form for creating a new Vertue.
         *
         * @return Response
         */
        public function create()
        {
    		$partieUtilisees  = $this->partieUtiliseeRepository->model()::pluck('nomPartie','id'); 
            $regionPratiquees = $this->regionPratiqueeRepository->model()::pluck('nomRegion','id');
            $plantes = $this->planteRepository->model()::pluck('nomScientifique','id');
            return view('vertues.create')->with('partieUtilisees', $partieUtilisees)->with('plantes', $plantes)->with('regionPratiquees',$regionPratiquees);

        }

        /**
         * Store a newly created Vertue in storage.
         *
         * @param CreateVertueRequest $request
         *
         * @return Response
         */
        public function store(CreateVertueRequest $request)
        {
            
            $input = $request->all();

            $vertue = $this->vertueRepository->create($input);
            $this->save($vertue);
            Flash::success('Vertue saved successfully.');

           // return redirect(route('vertues.index'));
        }

        public function save($vertues){
            //return $vertues;
            //print($vertues->plante->zoneRencontrees);
            //$plante= Plante::where('nomScientifique',$request->plante);
            $data = [
                'index' => 'vertues',
                'type' => 'vertues',
                'id' => $vertues->id,
                'body' => [
                    'nomVertue' =>$vertues->nomVertue,
                    'recette'   => $vertues->recette,
                    'utilisation' => $vertues->utilisation, 
                    'plantes' => $vertues->plante,
                    'zoneRencontree' => $vertues->plante->zoneRencontrees,
                    'nomPartie' => $vertues->partieutilisee->nomPartie,
                    'regionPratiquees' =>$vertues->regionpratiquee,
                ]
            ];

            $client = ClientBuilder::create()->build();
            $return = $client->index($data);
        }



        /**
         * Display the specified Vertue.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function show($id)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            return view('vertues.show')->with('vertue', $vertue);
        }

        /**
         * Show the form for editing the specified Vertue.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function edit($id)
        {
            $vertue = $this->vertueRepository->find($id);
            $partieUtilisees  = $this->partieUtiliseeRepository->model()::pluck('nomPartie','id'); 
            $regionPratiquees = $this->regionPratiqueeRepository->model()::pluck('nomRegion','id');
            $plantes = $this->planteRepository->model()::pluck('nomScientifique','id');

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            return view('vertues.edit')->with('vertue', $vertue)->with('partieUtilisees', $partieUtilisees)->with('plantes', $plantes)->with('regionPratiquees',$regionPratiquees);
        }

        /**
         * Update the specified Vertue in storage.
         *
         * @param  int              $id
         * @param UpdateVertueRequest $request
         *
         * @return Response
         */
        public function update($id, UpdateVertueRequest $request)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            $vertue = $this->vertueRepository->update($request->all(), $id);
            $this->modifier($vertue);

            Flash::success('Vertue updated successfully.');

            return redirect(route('vertues.index'));
        }


        public function modifier($vertues){
            //return $vertues;
            //print($vertues->plante->zoneRencontrees);
            //$plante= Plante::where('nomScientifique',$request->plante);

            $data = [
                'index' => 'vertues',
                'type' => 'vertues',
                'id' => $vertues->id,
                'body' => [
                    'doc' => [
                        'nomVertue' =>$vertues->nomVertue,
                        'recette'   => $vertues->recette,
                        'utilisation' => $vertues->utilisation, 
                        'plantes' => $vertues->plante,
                        'zoneRencontree' => $vertues->plante->zoneRencontrees,
                        'nomPartie' => $vertues->partieutilisee->nomPartie,
                        'regionPratiquees' =>$vertues->regionpratiquee,
                    ]
                ]
            ];

            $client = ClientBuilder::create()->build();
            $return = $client->update($data);
            
        }


        /**
         * Remove the specified Vertue from storage.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function destroy($id)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            $this->vertueRepository->delete($id);
            $this->supprimer($vertue);

            // $params = [
            //         'index' => 'phpindex',
            //         'type' => 'my_type',
            //         'id' => '1'
            //     ];

            //     $response = $client->delete($params);
            //     print_r($response);


            Flash::success('Vertue deleted successfully.');

            return redirect(route('vertues.index'));
        }


        public function supprimer($vertues){
            //return $vertues;
            //print($vertues->plante->zoneRencontrees);
            //$plante= Plante::where('nomScientifique',$request->plante);
            $data = [
                'index' => 'vertues',
                'type' => 'vertues',
                'id' => $vertues->id
            ];
            $client = ClientBuilder::create()->build();
            $response = $client->delete($data);
        }

        public function search(Request $request)
        {
            if($request->has('text') && $request->input('text')) {
    
                // Search for given text and return data
                $data = $this->searchVertues($request->input('text'));
                $vertuesArray = [];
    
                // If there are any vertues that match given search text "hits" fill their id's in array
                if($data['hits']['total'] > 0) {
    
                    foreach ($data['hits']['hits'] as $hit) {
                        $vertuesArray[] = $hit['_source']['id'];
                    }
                }
    
                // Retrieve found vertues from database
                //$vertues = vertues::with('partiulisees')
                               //->whereIn('id', $vertuesArray)
                               //->get();


                $vertues = $this->vertueRepository->find($vertuesArray);    
                // Return to view with data
                return view('vertues.index', ['vertue' => $vertues]);
            } else {
                return redirect()->route('acceuil');
            }
        }
    
        function searchVertues(Request $request)
        {
            //var_dump("expression");
            //var_dump($request->text);
            //exit();
            $text=$request->text;
            //$text="test";
            $params = [
                'index' => 'vertues',
                'type' => 'vertues',
                'body' => [
                'query' => [
                    'multi_match' => [
                        'fuzziness'=>'2',
                        'fields' => ['nomVertue', 'recette', 'utilisation','plantes.nomScientifique', 'plantes.espece', 'plantes.famille', 'plantes.nomMoore', 'plantes.nomDioula', 'plantes.nomFulfulde', 'plantes.zone_rencontrees.nomzone', 'nomPartie', 'regionPratiquees.nomRegion'],
                        'query' => $text,
                        ],
                    ],
                ],
            ];
    
            $data = $this->client->search($params);
            //$result=json_decode($data);
            //return $data;
            /*if($data)
                    //return $data['hits']['hits'][0]['_source']['nomVertue'];
                return $data;
            else
               print("Non okkkk");*/
            return view('acceuil')->with('resultat',$data);

        }


                function recherche_avancee(Request $request)
        {
            //var_dump("expression");
            //var_dump($request->text);
            //exit();
            $text=$request->text;
            $plante=$request->plante;
            $vertue=$request->vertue;
            $region=$request->region;
            $params = [
                'index' => 'vertues',
                'type' => 'vertues',
                'body' => [
                'query' => [
                    'multi_match' => [
                        'fuzziness'=>'2',
                        'fields' => ['nomVertue', 'recette', 'utilisation','plantes.nomScientifique', 'plantes.espece', 'plantes.famille', 'plantes.nomMoore', 'plantes.nomDioula', 'plantes.nomFulfulde', 'plantes.zone_rencontrees.nomzone', 'nomPartie', 'regionPratiquees.nomRegion'],
                        'query' => $text,
                        ],
                    ],
                ],
            ];
    
            $data = $this->client->search($params);
            if($plante){
                $data = $data->where('plantes.nomScientifique', $plante);
            }
            if($vertue){
                $data = $data->where('nomVertue', $vertue);
            }
            if($region){
                $data = $data->where('regionPratiquees.nomRegion', $region);
            }

            $data = $data->paginate(6);

            return view('acceuil')->with('resultat',$data);

        }



        /**
            Fonction qui réduit un texte $texte à $long caractère + $marge de marge pour essayer de pas couper un mot
            @param string $text Contient un texte, même avec des balises HTML (qui seront retirer en sortie)
            @param int $long Nombre de caractère souhaité
            @param int $marge Permet de se donner une marge pour éviter de couper un mot mais aussi avoir une limite ferme
            @return string

            */


            function coupeCourt($texte,$long,$marge=10){
                $msg = stripslashes($texte) ;
                $msg = preg_replace("'<[^>]+>'U", "", trim(strip_tags($msg)) ) ;
                $taille = strlen($msg) ;
                if($long < $taille){
                    $message = substr($msg, 0, $long) ;
                    $i = $long ;
                    if ($i < $taille){ 
                        while ($msg[$i] != " " && isset($msg[$i]) && $i < ($long+$marge) ){
                            $message .= $msg[$i] ;
                            $i++ ;
                        }
                    }
                    if ($i < $taille){
                        $message .= "..." ;
                    }
                }else{
                    $message = $msg ;
                }
                return ($message) ;
            }
    }

