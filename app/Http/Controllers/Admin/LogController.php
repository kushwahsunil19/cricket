<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Log,Players,Team};
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       

        return view('admin.log');
    }

    public function getLogs(Request $request){
            // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
         $pageLength = $request->length; 
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table
        $query =  Log::with('menuTypeName')->with('teamTypeName')->with('playerTypeName')->latest();


        // Search
         $search = $request->search; 
         if($search !=''){
                $query = $query->where(function($query) use ($search){
                $query->orWhere('filename', 'like', "%".$search."%");
               // $query->orWhere('category', 'like', "%".$search."%");
                $query->orWhere('created_at', 'like', "%".$search."%");
                $query->orWhere('total_csv_row', 'like', "%".$search."%");

                $query = $query->OrwhereHas('menuTypeName', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                });
                $query = $query->OrwhereHas('teamTypeName', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                });
                $query = $query->OrwhereHas('playerTypeName', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
                });
            });
         }
        

        $orderByName = 'id';
        
        switch($orderColumnIndex){
            // case '0':
            //     $orderByName = 'id';
            //     break;
            case '1':
                $orderByName = 'filename';
                break;
            // case '2':
            //     $orderByName = 'category';
            //     break;
             case '3':
                $orderByName = 'created_at';
                break;
            //  case '5':
            //     $orderByName = 'team';
            //     break;
            //   case '6':
            //     $orderByName = 'points';
            //     break;
            //   case '7':
            //     $orderByName = 'year';
            //     break;
            //  case '8':
            //     $orderByName = 'month';
            //     break;

        
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();
       
        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
          $data =  Log::find($id)->delete();
       
        // if ($data) {
        //     return Redirect('admin/teams')->with('success', 'Team deleted Successfully');
        // } else {
        //     return Redirect('admin/teams')->with('error', 'Something went wrong!.');
        // }
          if ($data) {
            return response()->json(['success' => true]);
            } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete log.']);
            }

       
    }
    public function getLogcsvData($id){
       $row = Log::where('id',$id)->first();
       
       $whr = ['filename'=>$row->filename, 'menu_type_id'=>$row->menu_type_id, 'team_type_id'=>$row->team_type_id]; 
       $teamwhere = ['filename'=>$row->filename, 'menu_type_id'=>$row->menu_type_id, 'type_id'=>$row->team_type_id];                    
       $playerData = Players::where($whr)->get();
       $teamData = Team::where($teamwhere)->get();
     
       $tableType = '';
       if($playerData->isNotEmpty()){
        return view('admin.player_log',['id' => $id]);
         // return view('admin.players', ['team_type' => $data_team_type ,  'meun_type' => $data_menu_type]);

       }else if($teamData->isNotEmpty()){
       
         return view('admin.team_log',['id' => $id]);
       }
      
    }
     public function getTeamLogData(Request $request)
    {
       $row = Log::where('id',$request->log_id)->first();       
     
       $teamwhere = ['filename'=>$row->filename, 'menu_type_id'=>$row->menu_type_id, 'type_id'=>$row->team_type_id]; 
       
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
        $pageLength = $request->length; 
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table

        $query =  Team::where($teamwhere)->latest(); 

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
    public function getPlayersLogData(Request $request){
      
        $row = Log::where('id',$request->log_id)->first();       
        $whr = ['filename'=>$row->filename, 'menu_type_id'=>$row->menu_type_id, 'team_type_id'=>$row->team_type_id]; 
       // $playerData = Players::where($whr)->get();
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
         $pageLength = $request->length; 
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from products table
        $query =  Players::with('typeP')->with('typeT')->with('menuT')->where($whr)->latest(); 

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
}
