<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\teamType;
use App\Models\menuType;
use App\Models\playerType;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Traits\CustomPaginatorTrait;

class HomePlayerController extends Controller
{
    use CustomPaginatorTrait;
    public function getPlayers()
    {
        $data = Players::all();
        $data_team_type = teamType::all();
        $data_menu_type = menuType::all();
        return view('admin.home.player', ['players' => $data, 'team_type' => $data_team_type ,  'meun_type' => $data_menu_type]);
    }

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

        if ($type == 'latest-ratings') {
            if ($pType) {
                $currentYear = '2023';
                $currentMonth = 'December';

                $player_data_query = Players::with('typeT', 'typeP')
                    ->where('player_type_id', $pType)
                    ->where('team_type_id', $cat)
                  /*  ->where('year', $currentYear)
                    ->where('month', $currentMonth)*/
                    ->when($searchInput, function ($player_data_query) use ($searchInput) {
                        $player_data_query->where(function ($innerQuery) use ($searchInput) {
                            $innerQuery->where('ranking', 'like', '%' . $searchInput . '%')
                                ->orWhere('player', 'like', '%' . $searchInput . '%')
                                ->orWhere('team', 'like', '%' . $searchInput . '%')
                                ->orWhere('points', 'like', '%' . $searchInput . '%');
                        });
                    })
                    ->orderBy('id', 'desc')
                    ->take(10)->get()
                    ->sortBy('ranking')
                    ->values();

                $is_player = true;

            } else {

                 //$currentYear = date('Y');
                // $currentMonth = date('F');
                $currentYear = '2023';
                $currentMonth = 'December';
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
                    ->orderBy('id', 'desc')
                    ->take(10)->get()
                    ->sortBy('ranking')
                    ->values();
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

        return view('home', ['player_data' => $player_data_query, 'team_data' => $team_data_query, 'is_player' => $is_player, 'teamType' => $teamType, 'playerType' => $playerType]);
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
                ->limit(250)
                ->get();

            $perPage = 100;
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
                ->limit(250)
                ->get();

            $perPage = 100;
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
                    foreach ($csvData as $index => $row) {
                        if ($index == 0) {
                            continue;
                        }

                        $playerType = playerType::whereRaw('LOWER(name) = ?', strtolower($row[13]))->first();

                        if (!$playerType) {
                            return redirect()->back()->with('error', 'Invalide player type. Please get demo csv file and check');
                        }


                        DB::table('players')->insert([
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
                            'player_type_id' => $playerType->id,
                            'team_type_id' => $request->type,
                            'menu_type_id' => $request->menu_type,
                            'year' => $row[10],
                            'month' => $row[11],
                            'format' => $row[12],
                            'category' => $row[13],
                            'created_at' => $currentTimestamp,
                            'updated_at' => $currentTimestamp,
                        ]);
                        DB::commit();
                    }
                    return redirect()->back()->with('success', 'CSV data uploaded successfully');
                }
            }
            return redirect()->back()->with('error', 'Please upload a CSV file');
        } catch (\Throwable $th) {
            DB::rollBack();
            print_r($th);
            die;
            return redirect('admin/players')->with('error', $th);
        }
    }

    public function deletePlayer($id)
    {
        $data =  Players::find($id)->delete();
        if ($data) {
            return Redirect('admin/players')->with('success', 'Player deleted Successfully');
        } else {
            return Redirect('admin/players')->with('error', 'Something went wrong!.');
        }
    }

    public function getTeamData()
    {
        $data = Team::all();
        $data_team_type = teamType::all();
        $data_menu_type = menuType::all();
        return view('admin.teams', ['teams' => $data, 'team_type' => $data_team_type,  'meun_type' => $data_menu_type]);
    }

    public function uploadTeamsCSV(Request $request)
    {
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
                    foreach ($csvData as $index => $row) {
                        if ($index == 0) {
                            continue;
                        }

                        DB::table('teams')->insert([
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
                            'month' => $row[8],
                            'format' => $row[9],
                            'created_at' => $currentTimestamp,
                            'updated_at' => $currentTimestamp,
                        ]);

                        DB::commit();
                    }
                    return redirect()->back()->with('success', 'CSV data uploaded successfully');
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
        if ($data) {
            return Redirect('admin/teams')->with('success', 'Team deleted Successfully');
        } else {
            return Redirect('admin/teams')->with('error', 'Something went wrong!.');
        }
    }
}
