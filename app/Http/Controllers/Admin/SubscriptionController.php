<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Subcription};
use Illuminate\Support\Facades\DB;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        

        return view('admin.subcription');
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
        $query =  Subcription::latest();

        // Search
         $search = $request->search; 
         if($search !=''){
                $query = $query->where(function($query) use ($search){
                $query->orWhere('name', 'like', "%".$search."%");
                $query->orWhere('email', 'like', "%".$search."%");
                $query->orWhere('created_at', 'like', "%".$search."%");
               
            });
         }
        

        $orderByName = 'id';
        
        switch($orderColumnIndex){
            // case '0':
            //     $orderByName = 'id';
            //     break;
            case '1':
                $orderByName = 'name';
                break;
            case '2':
                $orderByName = 'email';
                break;
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
    public function create(Request $request)
    {
          
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         DB::beginTransaction();
           $input = $request->all();
         
         try {          
                        $currentTimestamp = now();           
                        Subcription::create([
                            'name' =>$input['name'],
                            'email' => $input['email'],                         
                            'created_at' => $currentTimestamp,
                            'updated_at' => $currentTimestamp,
                        ]);

                        DB::commit();
                         //  return response()->json(['success'=>'Subcription successfully.']);
                       return redirect()->back()->with('success', 'Thank you for subcription.');
    
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th);
        }
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
          $data =  Subcription::find($id)->delete();
       
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
}
