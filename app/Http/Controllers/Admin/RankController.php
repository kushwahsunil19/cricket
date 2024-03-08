<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Players,Log};
use App\Models\teamType;
use App\Models\menuType;
use App\Models\playerType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Traits\CustomPaginatorTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use DataTables;
class RankController extends Controller
{
    use CustomPaginatorTrait;
    public function index(Request $request){
             $data_team_type = teamType::all();
             $data_menu_type = menuType::all();
             $data_player_type = playerType::all();
                  ## Read value
            

       
            return view('admin.players', ['team_type' => $data_team_type ,  'meun_type' => $data_menu_type,'players_type' => $data_player_type]);

    }
     public function getPlayersData(Request $request){
      
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
         $pageLength = $request->length; 
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table
        $query =  Players::with('typeP')->with('typeT')->with('menuT')->latest(); 

        // Search
         $search = $request->search; 
         if($search !=''){
                $query = $query->where(function($query) use ($search){
                $query->orWhere('ranking', 'like', "%".$search."%");
                $query->orWhere('player', 'like', "%".$search."%");
                $query->orWhere('team', 'like', "%".$search."%");
                $query->orWhere('points', 'like', "%".$search."%");
                $query->orWhere('year', 'like', "%".$search."%");
                $query->orWhere('month', 'like', "%".$search."%");
            });
            $query = $query->OrwhereHas('menuT', function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
             });
             $query = $query->OrwhereHas('typeP', function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
             });
              $query = $query->OrwhereHas('typeT', function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
             });
         }
        

        $orderByName = 'id';
        
        switch($orderColumnIndex){
            // case '0':
            //     $orderByName = 'id';
            //     break;
            case '1':
                $orderByName = 'ranking';
                break;
            case '2':
                $orderByName = 'id';
                break;
             case '3':
                $orderByName = 'player';
                break;
             case '5':
                $orderByName = 'team';
                break;
              case '6':
                $orderByName = 'points';
                break;
              case '7':
                $orderByName = 'year';
                break;
             case '8':
                $orderByName = 'month';
                break;
             case '9':
                $orderByName = 'menu_type_id';
                break;
             case '10':
                $orderByName = 'team_type_id';
                break;
             case '11':
                $orderByName = 'player_type_id';
                break;

        
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();
       
        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }
    // public function getPlayers()
    // {
    //     $data = Players::latest()->get(); 
    //     $data_team_type = teamType::all();
    //     $data_menu_type = menuType::all();
    //     return view('admin.player', ['players' => $data, 'team_type' => $data_team_type ,  'meun_type' => $data_menu_type]);
    // }


    public function getPList(Request $request, $type, $cat)
    {
        // print_r($request->all()); die;
        $pType = $request->query('p_type');
        $player_data_query = [];
        $team_data_query = [];
        $is_player = false;
        $year = $request->query('year');
        $month = $request->query('month');
        $searchInput = $request->query('search');
        $currentYear = date('Y', strtotime(date('Y-m') . " -1 month")); 
        $currentMonth = date('F', strtotime(date('Y-m') . " -1 month"));
        if ($type == 'latest-ratings') {
            if ($pType) {
               if($pType==1){
               
                $team_data_query = Team::with('type')
                    ->where('type_id', $cat)
                    ->where('year', $currentYear)
                    ->where('month', $currentMonth)
                    ->when($searchInput, function ($team_data_query) use ($searchInput) {
                        $team_data_query->where(function ($innerQuery) use ($searchInput) {
                            $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                                ->orWhere('team', 'like', '%' . $searchInput . '%')
                                ->orWhere('points', 'like', '%' . $searchInput . '%');
                        });
                    })
                   /*  ->limit(250)*/
                   ->get()->sortBy("ranking");

               }else{
                 
 
                $player_data_query = Players::with('typeT', 'typeP')
                    ->where('player_type_id', $pType)
                    ->where('team_type_id', $cat)
                    ->where('year', $currentYear)
                    ->where('month', $currentMonth)
                    ->when($searchInput, function ($player_data_query) use ($searchInput) {
                        $player_data_query->where(function ($innerQuery) use ($searchInput) {
                            $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                                ->orWhere('player', 'like', '%' . $searchInput . '%')
                                ->orWhere('team', 'like', '%' . $searchInput . '%')
                                ->orWhere('points', 'like', '%' . $searchInput . '%');
                        });
                    })
                    /*->limit(250)*/
                    ->get()->sortBy("ranking");                  
                $is_player = true;
               }
               
            } else {

            
                 //$currentYear = date('Y');
                // $currentMonth = date('F');
              
                $team_data_query = Team::with('type')
                    ->where('type_id', $cat)
                    ->where('year', $currentYear)
                    ->where('month', $currentMonth)
                    ->when($searchInput, function ($team_data_query) use ($searchInput) {
                        $team_data_query->where(function ($innerQuery) use ($searchInput) {
                            $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                                ->orWhere('team', 'like', '%' . $searchInput . '%')
                                ->orWhere('points', 'like', '%' . $searchInput . '%');
                        });
                    })
                     /*->limit(250)*/
                   ->get()->sortBy("ranking");
            }
        } elseif ($type == 'historical-ratings') {
            if ($pType) {
                $is_player = true;
            }


            $data = $this->historicalRating($pType, $cat, $year, $month, $searchInput);
            $player_data_query = $data['player_data_query'];
            $team_data_query = $data['team_data_query'];
        } elseif ($type == 'annual-ratings') {
            if ($pType) {
                $is_player = true;
            }


            $data = $this->annualRating($pType, $cat, $year, $month, $searchInput);
            $player_data_query = $data['player_data_query'];
            $team_data_query = $data['team_data_query'];

        } else {
            // atb-performance
        }

        $teamType = teamType::all();

        $playerType = playerType::all();

        return view('rankings', ['player_data' => $player_data_query, 'team_data' => $team_data_query, 'is_player' => $is_player, 'teamType' => $teamType, 'playerType' => $playerType]);
    }

    private function historicalRating($pType, $cat, $year, $month, $searchInput)
    {
        $history = '1';
        $player_data_query = [];
        $team_data_query = [];
         /*$currentYear = '2023';
        $currentMonth = 'December';*/
        $currentYear = date("Y");
        $currentMonth = date('F');
        if ($pType) {
            

            $player_data_query = Players::with('typeT', 'typeP')
                ->where('player_type_id', $pType)
                ->where('team_type_id', $cat)               
                ->where('menu_type_id', '1')
                ->when($year=='', function ($player_data_query) use ($currentYear) {
                    return $player_data_query->where('year', $currentYear);
                })
                ->when($month=='', function ($player_data_query) use ($currentMonth) {
                    return $player_data_query->where('month', $currentMonth);
                })

                ->when($year, function ($player_data_query) use ($year) {
                    return $player_data_query->where('year', $year);
                })
                ->when($month, function ($player_data_query) use ($month) {
                     $month = date('F', mktime(0, 0, 0, $month, 1));    
                    return $player_data_query->where('month', $month);
                })
                ->when($searchInput, function ($player_data_query) use ($searchInput) {
                    $player_data_query->where(function ($innerQuery) use ($searchInput) {
                        $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                            ->orWhere('player', 'like', '%' . $searchInput . '%')
                            ->orWhere('team', 'like', '%' . $searchInput . '%')
                            ->orWhere('points', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orderBy('ranking', 'asc')
               /* ->limit(250)*/
                ->get();

            $perPage = 250;
            $page = request()->get('page', 1); // Get the current page number from the request

            // Paginate the fetched 250 records manually
            $player_data_query = new \Illuminate\Pagination\LengthAwarePaginator(
                $player_data_query->forPage($page, $perPage),
                $player_data_query->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {           

            $team_data_query = Team::with('type')
                ->where('type_id', $cat)
                ->where('menu_type_id', $history)
                ->where('menu_type_id', '1')
                ->when($year=='', function ($team_data_query) use ($currentYear) {
                    return $team_data_query->where('year', $currentYear);
                })
                ->when($month=='', function ($team_data_query) use ($currentMonth) {                 
                    return $team_data_query->where('month', $currentMonth);
                })

                ->when($year, function ($team_data_query) use ($year) {
                    return $team_data_query->where('year', $year);
                })
                ->when($month, function ($team_data_query) use ($month) {   
                    $month = date('F', mktime(0, 0, 0, $month, 1));              
                    return $team_data_query->where('month', $month);
                })

                ->when($searchInput, function ($team_data_query) use ($searchInput) {
                    $team_data_query->where(function ($innerQuery) use ($searchInput) {
                        $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                            ->orWhere('team', 'like', '%' . $searchInput . '%')
                            ->orWhere('points', 'like', '%' . $searchInput . '%');
                    });
                })
             /*   ->limit(250)*/
                ->get();

            $perPage = 250;
            $page = request()->get('page', 1); // Get the current page number from the request

            // Paginate the fetched 250 records manually
            $team_data_query = new \Illuminate\Pagination\LengthAwarePaginator(
                $team_data_query->forPage($page, $perPage),
                $team_data_query->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }



        return ['team_data_query' => $team_data_query, 'player_data_query' => $player_data_query];
    }

    private function annualRating($pType, $cat, $year, $month, $searchInput)
    {
        $history = '1';
        $player_data_query = [];
        $team_data_query = [];
        /*$currentYear = '2023';
        $currentMonth = 'December';*/
        $currentYear = date("Y");
        $currentMonth = date('F');
        if ($pType) {           

            $player_data_query = Players::with('typeT', 'typeP')
                ->where('player_type_id', $pType)
                ->where('team_type_id', $cat)
                ->when($year=='', function ($player_data_query) use ($currentYear) {  
                    return $player_data_query->where('year', $currentYear);
                })        
                ->where('menu_type_id', '2')
                ->when($year, function ($player_data_query) use ($year) {

                    return $player_data_query->where('year', $year);
                })
                ->when($month, function ($player_data_query) use ($month) {
                    $month = date('F', mktime(0, 0, 0, $month, 1));         
                    return $player_data_query->where('month', $month);
                })
                ->when($searchInput, function ($player_data_query) use ($searchInput) {
                    $player_data_query->where(function ($innerQuery) use ($searchInput) {
                        $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                            ->orWhere('player', 'like', '%' . $searchInput . '%')
                            ->orWhere('team', 'like', '%' . $searchInput . '%')
                            ->orWhere('points', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orderBy('ranking', 'asc')
              /*  ->limit(250)*/
                ->get();

            $perPage = 250;
            $page = request()->get('page', 1); // Get the current page number from the request

            // Paginate the fetched 250 records manually
            $player_data_query = new \Illuminate\Pagination\LengthAwarePaginator(
                $player_data_query->forPage($page, $perPage),
                $player_data_query->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {          


            $team_data_query = Team::with('type')
                ->where('type_id', $cat)                
                ->where('menu_type_id', '2')    
                ->when($year=='', function ($team_data_query) use ($currentYear) {  
                    return $team_data_query->where('year', $currentYear);
                })          
                 ->when($year, function ($team_data_query) use ($year) {                  
                    return $team_data_query->where('year', $year);
                })
                ->when($month, function ($team_data_query) use ($month) {
                   
                    return $team_data_query->where('month', $month);
                })

                ->when($searchInput, function ($team_data_query) use ($searchInput) {
                    $team_data_query->where(function ($innerQuery) use ($searchInput) {
                        $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                            ->orWhere('team', 'like', '%' . $searchInput . '%')
                            ->orWhere('points', 'like', '%' . $searchInput . '%');
                    });
                })
                ->limit(250)
                ->get();

            $perPage = 100;
            $page = request()->get('page', 1); // Get the current page number from the request

            // Paginate the fetched 250 records manually
            $team_data_query = new \Illuminate\Pagination\LengthAwarePaginator(
                $team_data_query->forPage($page, $perPage),
                $team_data_query->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );

        }



        return ['team_data_query' => $team_data_query, 'player_data_query' => $player_data_query];
    }


    public function uploadPlayerCSV(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
        'players_csv' => 'required|file|mimes:csv|max:2097152', // 2 GB in KB
        ]);
       
          if ($validator->fails()) {
             $errors = implode("<br>", $validator->errors()->all()); 
             return redirect()->back()->with('error', $errors);
          
         }
        
        DB::beginTransaction();
        try {
            if (!asset($request->type)) {
                return redirect()->back()->with('error', 'Please Select team type.');
            }
            $currentTimestamp = now();
            if ($request->hasFile('players_csv')) {
                $file = $request->file('players_csv');
                if ($file->getClientOriginalExtension() === 'csv') {
                    $filePath = $file->getRealPath();
                    $csvData = array_map('str_getcsv', file($filePath));
                    $filename = $request->file('players_csv')->getClientOriginalName();
                   // $csvrowCount = count($csvData);
                    $data = [
                    'filename'=>$filename,
                    'menu_type_id' => $request->menu_type,
                    'team_type_id'=> $request->type, 
                     'player_type_id'=> $request->player_type,                                      
                    ];
                 
                   // $existingFileName = Log::where(['filename'=>$filename , 'category'=>$category])->first();
                    $whr = ['filename'=>$filename, 'menu_type_id'=>$request->menu_type, 'team_type_id'=>$request->type,'player_type_id'=>$request->player_type];                    
                  
                    if (Players::where($whr)->exists()) {

                        $deleted = Players::where($whr)->delete();
                         Log::where($data)->delete();
                         DB::commit();                       
                      
                        $filePath = public_path('uploads/' . $filename);                      
                        // Check if the file exists before attempting to delete
                        if (file_exists($filePath)) {
                        // Delete the file from the server
                            unlink($filePath);                           
                        }                       
                    }   

                //  if (!$existingFileName) {

                    $request->file('players_csv')->move(public_path('uploads'), $filename);
                  
                    $csvrowCount = 0;
                    foreach ($csvData as $index => $row) {
                        if ($index == 0) {
                            continue;
                        }
                            
                            //$playerType = playerType::whereRaw('LOWER(name) = ?', strtolower(isset($row[13])?$row[13]:$row[12]))->first();

                            // if (!$playerType) {
                            //     return redirect()->back()->with('error', 'Invalide player type. Please get demo csv file and check');
                            // }

                            if($row[0]!='' && $row[1]!='' && $row[2]!='' && $row[3] !='' && $row[4] !=''){

                            $csvrowCount++;
                           $playerData =[
                                'ranking' => $row[1],
                                'ref' => $row[0],
                                'player_ref' => $row[2],
                                'player_image_link' => $row[4],
                                'player' => $row[3],
                                'team_flag_link' => $row[7],
                                'team_ref' => $row[5],
                                'team' => $row[6],
                                'points' => $row[9],
                                'matches' => $row[8],
                                'player_id' => $row[2],
                                'player_type_id' => $request->player_type,
                                'team_type_id' => $request->type,
                                'menu_type_id' => $request->menu_type,
                                'year' => $row[10],
                                'month' =>  isset($row[13])?$row[11]:'',
                                'format' => isset($row[13])?$row[12]:$row[11],
                                'filename' =>$filename,                                 
                                'category' => isset($row[13])?$row[13]:$row[12],
                                'created_at' => $currentTimestamp,
                                'updated_at' => $currentTimestamp,
                            ];
                            // $matchThese =[
                            //     'ranking' => $row[1],
                            //     'ref' => $row[0],
                            //     'player_ref' => $row[2],
                            //     'player_image_link' => $row[4],
                            //     'player' => $row[3],
                            //     'team_flag_link' => $row[7],
                            //     'team_ref' => $row[5],
                            //     'team' => $row[6],
                            //     'points' => $row[9],
                            //     'matches' => $row[8],
                            //     'player_id' => $row[2],
                            //     'player_type_id' => $playerType->id,
                            //     'team_type_id' => $request->type,
                            //     'menu_type_id' => $request->menu_type,
                            //     'year' => $row[10],
                            //     'month' =>  isset($row[13])?$row[11]:'',
                            //     'format' => isset($row[13])?$row[12]:$row[11],
                            //     'filename' =>$filename,                                 
                            //     'category' => isset($row[13])?$row[13]:$row[12],                               
                            // ];

                            Players::create($playerData);
                        
                            //Players::updateOrCreate($matchThese,$playerData);
                            DB::commit();
                        }
                    }
                   // $rowCount = Players::where($whr)->count();
                     $logdata = [
                    'filename'=>$filename,
                    'menu_type_id' => $request->menu_type,
                    'team_type_id'=> $request->type,  
                    'player_type_id'=> $request->player_type,  
                    'total_csv_row'=> $csvrowCount,                         
                    ];

                      Log::create($logdata);
                    return redirect()->back()->with('success', 'CSV data uploaded successfully');
                // }
                // return redirect()->back()->with('error', 'Csv filename already exist');
                }
                return redirect()->back()->with('error', 'Please upload a CSV file');
            }
           
        } catch (\Throwable $th) {
            DB::rollBack();
            // print_r($th);
            // die;
            return redirect('admin/players')->with('error', $th);
        }
    }

    public function deletePlayer($id)
    {

        $data =  Players::find($id)->delete();
        // if ($data) {
        //     return Redirect('admin/players')->with('success', 'Player deleted Successfully');
        // } else {
        //     return Redirect('admin/players')->with('error', 'Something went wrong!.');
        // }
            if ($data) {
            return response()->json(['success' => true]);
            } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete player.']);
            }
    }

    public function getTeamData()
    {
       
        $data_team_type = teamType::all();
        $data_menu_type = menuType::all();
       
        return view('admin.teams_new', [ 'team_type' => $data_team_type,  'meun_type' => $data_menu_type]);
    }
     public function getTeamDataNew(Request $request)
    {
       
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
         $pageLength = $request->length; 
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table

        $query =  Team::latest(); 

        // Search
         $search = $request->search; 
         if($search !=''){
                $query = $query->where(function($query) use ($search){
                $query->orWhere('ranking', 'like', "%".$search."%");
                $query->orWhere('team_ref', 'like', "%".$search."%");
                $query->orWhere('team', 'like', "%".$search."%");
                $query->orWhere('points', 'like', "%".$search."%");
                $query->orWhere('matches', 'like', "%".$search."%");
                $query->orWhere('year', 'like', "%".$search."%");
                $query->orWhere('month', 'like', "%".$search."%");
               
            });
         }
         if($search !=''){
               $query->OrwhereHas('menutype', function ($query) use ($search) { 
                $query->where('name', 'like', $search.'%'); 
                });
            }
        if($search !=''){
               $query->OrwhereHas('type', function ($query) use ($search) { 
                $query->where('name', 'like', $search.'%'); 
                });
            }
        

        $orderByName = 'id';
        
        switch($orderColumnIndex){
            // case '0':
            //     $orderByName = 'id';
            //     break;
            case '1':
                $orderByName = 'ranking';
                break;
            case '2':
                $orderByName = 'team_ref';
                break;
             case '3':
                $orderByName = 'team';
                break;
             case '4':
                $orderByName = 'points';
                break;
              case '5':
                $orderByName = 'matches';
                break;
              case '7':
                $orderByName = 'year';
                break;
             case '8':
                $orderByName = 'month';
                break;
             case '9':
                $orderByName = 'type_id';
            break;
             case '10':
                $orderByName = 'menu_type_id';
            break;

        
        }
        $query = $query->with('type','menutype')->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();
     
        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }

    public function uploadTeamsCSV(Request $request)
    {
         $validator = Validator::make($request->all(), [
        'teams_csv' => 'required|file|mimes:csv|max:2097152', // 2 GB in KB
        ]);
       
          if ($validator->fails()) {
             $errors = implode("<br>", $validator->errors()->all()); 
             return redirect()->back()->with('error', $errors);
          
         }
        DB::beginTransaction();
        try {
            if (!asset($request->type)) {
                return redirect()->back()->with('error', 'Please Select team type.');
            }
            $currentTimestamp = now();
            $team_type = $request->type;
            $menu_type = $request->menu_type;
            if ($request->hasFile('teams_csv')) {
                $file = $request->file('teams_csv');
                if ($file->getClientOriginalExtension() === 'csv') {
                    $filePath = $file->getRealPath();
                    $csvData = array_map('str_getcsv', file($filePath));
                    $filename = $request->file('teams_csv')->getClientOriginalName();
                    //$csvrowCount = count($csvData);
                   
                    $data = [
                    'filename'=>$filename,
                    'menu_type_id' =>$request->menu_type,
                    'team_type_id' =>  $request->type                            
                    ];
                     // $existingFileName = Log::where(['filename'=>$filename , 'category'=>$category])->first();
           
                     $whr = ['filename'=>$filename, 'type_id'=>$team_type , 'menu_type_id'=>$menu_type];                           
                  
                     if (Team::where($whr)->exists()) {

                         $deleted = Team::where($whr)->delete();
                          Log::where($data)->delete();
                          DB::commit();                       
                       
                         $filePath = public_path('uploads/' . $filename);                      
                         // Check if the file exists before attempting to delete
                         if (file_exists($filePath)) {
                         // Delete the file from the server
                             unlink($filePath);                           
                         }                       
                     }  
                  // die; 
                //   if (!$existingFileName) {
                    $request->file('teams_csv')->move(public_path('uploads'), $filename);
                     $csvrowCount =0;
                    foreach ($csvData as $index => $row) {
                        if ($index == 0) {
                            continue;
                        }
                        if($row[0]!='' && $row[1]!='' && $row[2] !='' && $row[3] !='' && $row[4] !='' ){
                        $csvrowCount++;
                        $teamData = [
                            'ranking' => $row[1],
                            'team_flag_link' => $row[4],
                            'matches' => $row[5],
                            'team' => $row[3],
                            'points' => $row[6],
                            'type_id' => $team_type,
                            'menu_type_id' => $menu_type,
                            'ref' => $row[0],
                            'team_ref' => $row[2],
                            'year' => $row[7],
                            'month' => isset($row[9])?$row[8]:'',
                            'format' => isset($row[9])?$row[9]:$row[8],
                            'filename' =>$filename,  
                            'created_at' => $currentTimestamp,
                            'updated_at' => $currentTimestamp,
                        ];
                        // $matchThese = [
                        //     'ranking' => $row[1],
                        //     'team_flag_link' => $row[4],
                        //     'matches' => $row[5],
                        //     'team' => $row[3],
                        //     'points' => $row[6],
                        //     'type_id' => $team_type,
                        //     'menu_type_id' => $menu_type,
                        //     'ref' => $row[0],
                        //     'team_ref' => $row[2],
                        //     'year' => $row[7],
                        //     'month' => isset($row[9])?$row[8]:'',
                        //     'format' => isset($row[9])?$row[9]:$row[8],
                        //     'filename' =>$filename                             
                        // ];
                        Team::create($teamData);
                       // Team::updateOrCreate($matchThese,$teamData);
                        DB::commit();
                    }
                    }
                   // $rowCount = Team::where($whr)->count();
                    $logdata = [
                    'filename'=>$filename,
                    'menu_type_id' =>$request->menu_type,
                    'team_type_id' =>  $request->type,  
                    'player_type_id' => 1,            
                    'total_csv_row'=> $csvrowCount,                         
                    ];
                      Log::create($logdata);
                    return redirect()->back()->with('success', 'CSV data uploaded successfully');
                // }
                //   return redirect()->back()->with('error', 'Csv filename already exist');
                }
            }
            return redirect()->back()->with('error', 'Please upload a CSV file');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th);
        }
    }

    public function deleteTeam($id)
    {
        $data =  Team::find($id)->delete();
        // if ($data) {
        //     return Redirect('admin/teams')->with('success', 'Team deleted Successfully');
        // } else {
        //     return Redirect('admin/teams')->with('error', 'Something went wrong!.');
        // }
          if ($data) {
            return response()->json(['success' => true]);
            } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete team.']);
            }
    }
    public function profile(){

        $id = auth()->user()->id; 
        $data = User::where('id', $id)->first();
       return view('admin.profile.profile', ['result'=>$data]);
    }
    public function profilePost(Request $request){
        $request->validate([
            'profile_logo'    => 'required',
           
        ]);
        $input = $request->all();
         $id = auth()->user()->id; 
        User::where('id', $id)->update([
           'profile_logo' =>$input['profile_logo'],
           'facebook' =>$input['facebook'],
           'twitter' =>$input['twitter'],
           'linkedin' =>$input['linkedin'],
           'instagram' =>$input['instagram'],
        ]);
       
        return redirect()->back()->with('success', 'Prfile updated successfully.');
       
    }
     /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        echo $id;die;
    }
}
