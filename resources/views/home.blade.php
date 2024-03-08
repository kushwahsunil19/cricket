@extends('layouts.app')

@section('title','Feedback | MVT')
@section('description','MVT BETTING')
@section('keyword','feedback')
@section('content')
<style>
    .ffffffffff {
        background-color: red;
    }

    .world-ranking {
        color: #fff;
        font-size: 48px;
        margin-top: 0px;
    }

 
    .table thead th, .table td, .table th
    {
         font-size: 14px !important;
    }

    .box-new {
        padding: 75px;
    }

    .table-design {

        font-size: 17px !important;
        text-align: left;
        margin-bottom: 0rem !important;
        font-weight: 600 !important;

        text-decoration-color: #E54D11;
        text-decoration-thickness: 2px;
        border: 2px solid #D3D3D3;
    }

    .table thead th,
    .table td,
    .table th {
        border: 1px solid #DCDCDC !important;
    }

    .table-design tbody td {
        border: 1px solid #DCDCDC !important;
    }

    .table>tbody {
        vertical-align: inherit;
        background: #f5f5f5;
        color: black;
        font-weight: 500;
    }

    tr td.not-found {
        text-align: center;
    }

    .table-design tbody td {
        vertical-align: middle;
      /*  text-align: left;*/
        border: 1px solid #efe9e9;

    }

    .table-design tbody td img.img-set {
        display: inline-block;
        /* Ensure image is displayed inline */
        vertical-align: middle;
        /* Align image vertically middle */
        margin-right: 5px;
        /* Adjust as needed */
        margin-left: 0;
        /* Align image to the left */

    }


    .table>:not(caption)>*>* {
        padding: 0.2rem 0.5rem !important;
    }
    .table>:not(:last-child)>:last-child>* {
    /* border-bottom-color: currentColor; */
    background: #DCDCDC;
    }  
</style>

<!-- <section class="faqs-section faqs-page">
    <div class="overlay pt-40">
        <div class=" ">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        @if(isset($aboutUsContent->aboutUsContent))
                        <p>{!! $aboutUsContent->aboutUsContent !!}</p>
                        @else
                        <p>No content available.</p>
                        @endif
                    </div>
                </div>
</section> -->
<?php
$year = date('Y', strtotime(date('Y-m') . " -1 month"));

$month = date('F', strtotime(date('Y-m') . " -1 month"));
?>
<section class="faqs-section ptt-5 faqs-page">
    <div class="overlay">
        <div class=" ">
            <div class="row d-flex justify-content-center ">
                <div class="col-lg-12">
                    <div class="section-header text-center">
                        @if(isset($aboutUsContent->aboutUsContent))
                        <p>{!! $aboutUsContent->aboutUsContent !!}</p>
                        @else
                        <!-- <p>No content available.</p> -->
                        <!--  <div class="container-fluid ffffffffff">
                            <div class="p-4 text-center">
                                <h2 class="world-ranking">ICC WORLD RankINGS</h2>
                            </div>
                        </div> -->
                        <div class="container-fluid text-center homeTable">
                            <div class="row p-2">
                                <h3 class="team-rankings">Men’s Teams Rankings</h3>
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tbody>
                                                    @if(isset($data_team_test) && $data_team_test->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="not-found">
                                                            <span> <?php echo "Coming soon!"; ?></span>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                    @foreach ($data_team_test as $team)
                                                    <tr>
                                                        <td>{{ $team->ranking }}</td>
                                                        <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                        <td>{{ $team->points}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/1') }}?p_type=1" class="clickHere">here</a> for men's teams rankings in Tests</span>
                                   

                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tbody>
                                                    @if(isset($data_team_odi) && $data_team_odi->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="not-found">
                                                            <span> <?php echo "Coming soon!"; ?></span>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                    @foreach ($data_team_odi as $team)
                                                    <tr>
                                                        <td>{{ $team->ranking }}</td>
                                                        <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                        <td>{{ $team->points}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                     <span class="sortData">Click <a href="{{ url('h/latest-ratings/2') }}?p_type=1" class="clickHere">here</a> for men's teams rankings in ODIs</span>

                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($data_team_t20) && $data_team_t20->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="not-found">
                                                            <span> <?php echo "Coming soon!"; ?></span>
                                                        </td>

                                                    </tr>
                                                    @endif

                                                    @foreach ($data_team_t20 as $team)

                                                    <tr class="deepak">
                                                        <td>{{ $team->ranking }}</td>
                                                        <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                        <td>{{ $team->points}}</td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/3') }}?p_type=1" class="clickHere">here</a> for men's teams rankings in T20Is</span>

                                </div>

                               
                            </div>
                        </div>
                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">Men’s Batsmen Rankings</h3>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <table class="table table-design">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Rank</th>
                                                    <th scope="col">Tests</th>
                                                    <th scope="col">Points</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($data_batsman_test) && $data_batsman_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsman_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/1') }}?p_type=2" class="clickHere">here</a> for men's batsmen rankings in Tests</span>

                                </div>
                               
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <table class="table table-design">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Rank</th>
                                                    <th scope="col">ODIs</th>
                                                    <th scope="col">Points</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($data_batsman_odi) && $data_batsman_odi->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsman_odi as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/2') }}?p_type=2" class="clickHere">here</a> for men's batsmen rankings in ODIs</span>

                                </div>

                                
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <table class="table table-design">
                                            <thead>

                                                <tr>
                                                    <th scope="col">Rank</th>
                                                    <th scope="col">T20Is</th>
                                                    <th scope="col">Points</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if(isset($data_batsman_t20) && $data_batsman_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsman_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/3') }}?p_type=2" class="clickHere">here</a> for men's batsmen rankings in T20Is</span>


                                </div>
                            </div>
                        </div>

                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">Men’s Bowlers Rankings </h3>
                              <div class="col-sm-4">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_bowlers_test) && $data_bowlers_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_bowlers_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/1') }}?p_type=3" class="clickHere">here</a> for men's bowlers rankings in Tests</span>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_bowlers_odi) && $data_bowlers_odi->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_bowlers_odi as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/2') }}?p_type=3" class="clickHere">here</a> for men's bowlers rankings in ODIs</span>
                                </div>

                                
                                  <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($data_bowlers_t20) && $data_bowlers_t20->isEmpty())
                                                    <tr>
                                                        <td colspan="4" class="not-found">
                                                            <span> <?php echo "Coming soon!"; ?></span>
                                                        </td>

                                                    </tr>
                                                    @endif
                                                    @foreach ($data_bowlers_t20 as $team)
                                                    <tr>
                                                        <td>{{ $team->ranking }}</td>
                                                        <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                        <td>{{ $team->points}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/latest-ratings/3') }}?p_type=3" class="clickHere">here</a> for men's bowlers rankings in T20Is</span>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">Men’s Players Rankings</h3>
                              
                               <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_test) && $data_players_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                     <span class="sortData">Click <a href="{{ url('h/latest-ratings/1') }}?p_type=5" class="clickHere">here</a> for men's players rankings in Tests</span>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_odi) && $data_players_odi->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_odi as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                     <span class="sortData">Click <a href="{{ url('h/latest-ratings/2') }}?p_type=5" class="clickHere">here</a> for men's players rankings in ODIs</span>
                                </div>

                               

                                  <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_t20) && $data_players_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/latest-ratings/3') }}?p_type=5" class="clickHere">here</a> for men's players rankings in T20Is</span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">2023 Annual Awards for Men’s Teams</h3>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_team_annualy_test) && $data_team_annualy_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_team_annualy_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/annual-ratings/1') }}?p_type=1" class="clickHere">here</a> for annual awards for men’s teams in Tests</span>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_team_annualy_odis) && $data_team_annualy_odis->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_team_annualy_odis as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/annual-ratings/1') }}?p_type=1" class="clickHere">here</a> for annual awards for men’s teams in ODIs</span>

                                </div>
                         

                                  <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_team_annualy_t20) && $data_team_annualy_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_team_annualy_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->team_flag_link) }}">{{ $team->team }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/annual-ratings/1') }}?p_type=1" class="clickHere">here</a> for annual awards for men’s teams in T20Is</span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">2023 Annual Awards for Men’s Batsmen </h3>
                                
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_batsmen_annualy_test) && $data_batsmen_annualy_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsmen_annualy_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=2" class="clickHere">here</a> for annual awards for men’s batsmen in Tests</span>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_batsmen_annualy_odis) && $data_batsmen_annualy_odis->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsmen_annualy_odis as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=2" class="clickHere">here</a> for annual awards for men’s batsmen in ODIs</span>
                                </div>
                          

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_batsmen_annualy_t20) && $data_batsmen_annualy_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_batsmen_annualy_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=2" class="clickHere">here</a> for annual awards for men’s batsmen in T20Is</span>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">2023 Annual Awards for Men’s Bowlers </h3>
                              <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_bowlers_annualy_test) && $data_bowlers_annualy_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_bowlers_annualy_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=3" class="clickHere">here</a> for annual awards for men’s bowlers in Tests</span>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_bowlers_annualy_odis) && $data_bowlers_annualy_odis->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_bowlers_annualy_odis as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/annual-ratings/1') }}?p_type=3" class="clickHere">here</a> for annual awards for men’s bowlers in ODIs</span>
                                </div>
                                
                                  <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_bowlers_annualy_t20) && $data_bowlers_annualy_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_bowlers_annualy_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=3" class="clickHere">here</a> for annual awards for men’s bowlers in T20Is</span>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid text-center">
                            <div class="row p-2">
                                <h3 class="team-rankings">2023 Annual Awards for Men’s Players </h3>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">Tests</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_annualy_test) && $data_players_annualy_test->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_annualy_test as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <span class="sortData">Click <a href="{{ url('h/annual-ratings/1') }}?p_type=5" class="clickHere">here</a> for annual awards for men’s players in Tests</span>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">ODIs</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_annualy_odis) && $data_players_annualy_odis->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_annualy_odis as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1')}}?p_type=5" class="clickHere">here</a> for annual awards for men’s players in ODIs</span>
                                </div>
                               
                                 <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="card">
                                        <div>
                                            <table class="table table-design">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Rank</th>
                                                        <th scope="col">T20Is</th>
                                                        <th scope="col">Points</th>
                                                        <!-- <th scope="col">Handle</th> -->
                                                    </tr>
                                                </thead>
                                                @if(isset($data_players_annualy_t20) && $data_players_annualy_t20->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="not-found">
                                                        <span> <?php echo "Coming soon!"; ?></span>
                                                    </td>

                                                </tr>
                                                @endif
                                                @foreach ($data_players_annualy_t20 as $team)
                                                <tr>
                                                    <td>{{ $team->ranking }}</td>
                                                    <td><img class="img-set" src="{{ strtolower($team->player_image_link) }}">{{ $team->player }}</td>
                                                    <td>{{ $team->points}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                   <span class="sortData"> Click <a href="{{ url('h/annual-ratings/1') }}?p_type=5" class="clickHere">here</a> for annual awards for men’s players in T20Is</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
</section>


@endsection
