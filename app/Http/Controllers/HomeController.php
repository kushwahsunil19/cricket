<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teamType;
use App\Models\Players;
use App\Models\Team;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teamType = teamType::first();
        $firstTimeId = $teamType->id;
        return redirect('h/latest-ratings/' . $firstTimeId);
    }



    public function getHomePageData()
    {
        $teamType = teamType::first();
        $firstTimeId = $teamType->id;
        // $year = date('Y', strtotime(date('Y-m') . " -1 month"));
        // $month = date('F', strtotime(date('Y-m') . " -1 month"));
        $year = date('Y', strtotime(date('Y-m') . " -1 month"));
        $month = date('F', strtotime(date('Y-m') . " -1 month"));

        //Teams Start

        $data_team_t20 = Team::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('type_id', '=', 3)
            ->limit(10)
            ->get()->sortBy("ranking");


        $data_team_odi = Team::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('type_id', '=', 2)
            ->limit(10)
            ->get()->sortBy("ranking");

        $data_team_test = Team::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('type_id', '=', 1)
            ->limit(10)
            ->get()->sortBy("ranking");

        //Teams End

        //Batsman Start
        $data_batsman_t20 = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_batsman_odi = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_batsman_test = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");
        //Batsman end

        // Bowlers start
        $data_bowlers_t20 = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 3)

            ->limit(10)
            ->get()->sortBy("ranking");;

        $data_bowlers_odi = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 3)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_bowlers_test = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 3)

            ->limit(10)
            ->get()->sortBy("ranking");

        // Bowlers end

         /*Fielders */
            $data_fielders_test = Players::where('year', '=', $year)
             ->where('month', '=', $month)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_fielders_odis = Players::where('year', '=', $year)
             ->where('month', '=', $month)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_fielders_t20 = Players::where('year', '=', $year)
             ->where('month', '=', $month)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");

        // Allrounder start
        $data_players_t20 = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_players_odi = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");;

        $data_players_test = Players::where('year', '=', $year)
            ->where('month', '=', $month)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");

        // Allrounder end

        /********************** */

        $data_team_annualy_t20 = Team::where('type_id', '=', 3)
            ->where('menu_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_team_annualy_odis = Team::where('type_id', '=', 2)
            ->where('menu_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

        $data_team_annualy_test = Team::where('type_id', '=', 1)
            ->where('menu_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");
    

        $data_batsmen_annualy_t20 = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");


            $data_batsmen_annualy_odis = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

            $data_batsmen_annualy_test = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 2)

            ->limit(10)
            ->get()->sortBy("ranking");

             $data_bowlers_annualy_test = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 3)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_bowlers_annualy_odis = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 3)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_bowlers_annualy_t20 = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 3)
            ->limit(10)
            ->get()->sortBy("ranking");

            /*Fielders */
            $data_fielders_annualy_test = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_fielders_annualy_odis = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");

            $data_fielders_annualy_t20 = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 4)
            ->limit(10)
            ->get()->sortBy("ranking");





            $data_players_annualy_t20 = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 3)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");

            $data_players_annualy_odis = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 2)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");

            $data_players_annualy_test = Players::where('year', '=', $year)
            ->where('team_type_id', '=', 1)
            ->where('player_type_id', '=', 5)

            ->limit(10)
            ->get()->sortBy("ranking");
        /***************** */



        // echo '<pre>'; print_r($data_team_t20);die;

        // // $data_2type = Players::all();
        // // echo '<pre>';
        // // print_r($data_2type);
        // // die;


        return view('home', ['teamType' => $teamType, 'data_team_t20' => $data_team_t20, 'data_team_odi' => $data_team_odi, 'data_team_test' => $data_team_test, 'data_batsman_t20' => $data_batsman_t20, 'data_batsman_odi' => $data_batsman_odi, 'data_batsman_test' => $data_batsman_test, 'data_bowlers_t20' => $data_bowlers_t20, 'data_bowlers_odi' => $data_bowlers_odi, 'data_bowlers_test' => $data_bowlers_test, 'data_players_t20' => $data_players_t20, 'data_players_odi' => $data_players_odi, 'data_players_test' => $data_players_test, 'data_team_annualy_t20' => $data_team_annualy_t20, 'data_team_annualy_odis' => $data_team_annualy_odis, 'data_team_annualy_test' => $data_team_annualy_test, 'data_batsmen_annualy_t20' => $data_batsmen_annualy_t20, 'data_batsmen_annualy_odis' => $data_batsmen_annualy_odis, 'data_batsmen_annualy_test' => $data_batsmen_annualy_test , 'data_bowlers_annualy_t20' => $data_bowlers_annualy_t20 , 'data_bowlers_annualy_odis' => $data_bowlers_annualy_odis , 'data_bowlers_annualy_test' => $data_bowlers_annualy_test , 'data_players_annualy_t20' => $data_players_annualy_t20 , 'data_players_annualy_odis' => $data_players_annualy_odis , 'data_players_annualy_test' => $data_players_annualy_test, 'data_fielders_annualy_test' => $data_fielders_annualy_test, 'data_fielders_annualy_odis' => $data_fielders_annualy_odis, 'data_fielders_annualy_t20' => $data_fielders_annualy_t20, 'data_fielders_test' => $data_fielders_test, 'data_fielders_odis' => $data_fielders_odis, 'data_fielders_t20' => $data_fielders_t20,]);
    }

}
