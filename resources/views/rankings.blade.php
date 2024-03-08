@extends('layouts.app')

@section('title','Feedback | MVT')
@section('description','MVT BETTING')
@section('keyword','feedback')
@section('content')
{{-- 
<style>

   .btn-hover:hover {
   text-decoration: none;
   outline: none;
   color: var(--bs-white);
   }
   .set-search {
   border: 1px solid var(--border-color);
   width: 85px;
   border-radius: 10px;
   margin: 0px 10px;
   }
   .nice-select.bg_f.br.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover_fr {
   margin-right: 10px;
   }
   .nice-select:after {
   border-bottom: 2px solid #000000 !important;
   border-right: 2px solid #000000 !important;
   height: 8px!important;
   margin-top: -8px!important;
   right: 12px!important;
   width: 8px !important;
   }
   .set-search:hover {
   background-color: black;
   }
   .top_nav_sub {
   margin-left: 10px;
   }
   .top_nav {
   margin: left;
   margin: 30px 10px;
   }
   .table-seciont {
   }
  
.scrollToTop.active {
    padding-top: 10px !important;
    
}

   @media (max-width: 768px) {
   .top_nav,
   .top_nav_sub,
   .inner_table,
   .row {
   }
   .filter {
   }
   .col-md-6,
   .col-md-12 {
   }
   table {
   }

   }
</style>
--}}
<style>
   .btn-hover:hover {
   text-decoration: none;
   outline: none;
   color: var(--bs-white);
   }
   .set-search {
   border: 1px solid var(--border-color);
   width: 85px;
   border-radius: 10px;
   margin: 0px 10px;
   }
   .nice-select.bg_f.br_fr {
   margin-right: 10px;
   }
   .nice-select:after {
   border-bottom: 2px solid #000000 !important;
   border-right: 2px solid #000000 !important;
   height: 8px !important;
   margin-top: -8px !important;
   right: 12px !important;
   width: 8px !important;
   }
   tr {
   background: #F5F5F5!important;
   }
   tr td.not-found {
   text-align: center;
   }
</style>
<style>
   .set-search:hover {
   background-color: black;
   }
</style>
<style>
   .top_nav_sub {
   margin-left: 10px;
   }
   .top_nav {
   margin: left;
   margin: 12px 10px;
   }
   .faqs-section.faqs-page ul {
    border: 1px solid var(--border-color);
     border-radius:0px !important; 
     padding: 0px 0px !important;; 
    margin-bottom: 0px !important;;
}



</style>
{{--
<style>
   .active-color {
   background-color: #000 !important;}
   .lrt{
      color: black;
   }
</style>
--}}

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
  
   <div class="row top_nav">
      <?php $currentUrl_1 = request()->url();
         $segments_1 = explode('/', $currentUrl_1);
         $menuUrl_1 = $segments_1[5];
         $menuUrl_2 = $segments_1[4];
         
         ?>
      <?php if(($menuUrl_1 == '1') && ($menuUrl_2 == 'all-time-performance')  ){  ?>
      <div class="col-md-12 text-center">
         <img src="{{asset('assets/images/comming-soon.png')}}" style="width: 30%;">
      </div>
      <?php } ?>
      @php
      $currentUrl = request()->url();
      $segments = explode('/', $currentUrl);
      $lastEndpoint = end($segments);
      $payerId = request()->query('p_type');
      $menuUrl = $segments[4 ];
      @endphp
      <?php if(($menuUrl_2 != 'all-time-performance')  ){   ?>
      @foreach($teamType as $item)
      <a href="{{ url('h/'.$menuUrl.'/'.$item->id.'?p_type=1') }}"
         class="tab-first tab   table-tabs @if($lastEndpoint == $item->id) active-color @endif" class="cm-active" id="@if($lastEndpoint == $item->id){{$lastEndpoint}}@endif">
      {{$item->name}}
      </a>
      @endforeach
      <?php }  ?>
   </div>
   @if($menuUrl_2 =='historical-ratings' || $menuUrl_2 =='annual-ratings' || $menuUrl_2 =='latest-ratings' || $menuUrl_2 =='all-time-performance')  
     <style type="text/css">
       .scrollToTop.active { padding-top: 10px !important; }
     </style>
   @endif
   <?php if(($menuUrl_2 != 'all-time-performance')  ){  ?>
   <div class="row top_nav_sub">
      @foreach($playerType as $key=> $item)
      <a href="{{ url('h/'.$menuUrl.'/'.$lastEndpoint.'?p_type='.$item->id) }}"
         class="tab-first tab border-redius-20 table-tabs @if(! isset($payerId)) @if($key==0) active-color  teams @endif  @endif  @if($payerId == $item->id && $payerId) active-color @endif">
      {{$item->name}}  
      </a>
      @endforeach
   </div>
   <?php }  ?>
   <?php if( ($menuUrl_2 != 'all-time-performance')  ){  ?>
   <div class="row inner_table ">
      <div class="row">
         <div class="filter display-flx">
            @if ($menuUrl == 'historical-ratings' || $menuUrl == 'annual-ratings' )
            <div class="col-md-6 display-flx" style="padding-top: 4px;">
               <label class="margin-rt-10">Filter By</label>
               <form id="searchForm" action="{{ url()->current() }}" method="GET">
                  <div class="filter_top">
                     <select class="bg_f br_fr scrollable-select" name="year" id="yearSelect"  >
                        <option value="">Year</option>
                     </select>
                  

                     @if ($menuUrl == 'historical-ratings' )
                     <style type="text/css">
                       .scrollToTop.active { padding-top: 10px !important; }
                     </style>
                     <select class="bg_f br_se" name="month" id="monthSelect">
                        <option value="">month</option> -->
                        <!-- @php
                        //$currentMonth = request()->input('month', date('n'));
                        $currentMonth = '';
                        for ($i = 1; $i <= 12; $i++) { $selected=(request()->input('month', $currentMonth) ==
                        $i) ? 'selected' : '';
                        @endphp
                        <option value="{{ $i }}" {{ $selected }}>
                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                        @php
                        }
                        @endphp  -->
                        @php
                        $currentMonth = '';
                        for ($i = 1; $i <= 12; $i++) {
                        if ($i == 12) {
                        $selected = (request()->input('month', $currentMonth) == $i) ? 'selected' : '';
                        echo '<option value="' . $i . '" ' . $selected . '>';
                        echo date('F', mktime(0, 0, 0, $i, 1));
                        echo '</option>';
                          }
                        }  
                        @endphp

                     </select>
                     @endif
                     <input type="hidden" name="p_type" value="<?php echo Request::input('p_type');?>">
                     <!--    @foreach(request()->except('search') as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach -->
                     <button class="set-search " style="width: 70px;" type="submit">Filter </button>
                  </div>
               </form>
            </div>
            @endif
         </div>
         <!-- <div class="col-md-4 marg-search-f">
            <input type="search" id="liveSearchInput" name="search_first" placeholder="search">
            </div> -->
         <!-- <div> -->
         <div class="col-md-6 display-flx" >
            <label class="margin-rt-10">Search By</label>
            <form id="searchForm" action="{{ url()->current() }}" method="GET">
               <div class="filter_top">
                  <input type="search" id="liveSearchInput" name="search" placeholder="search"
                     value="{{ request()->query('search') }}">
                  <!-- Retain existing query parameters by adding them as hidden fields -->
                  @foreach(request()->except('search') as $key => $value)
                  <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                  @endforeach
                  <button class=" btn-hover set-search submitbtn " type="submit">Submit {{ request('id'); }}</button>
               </div>
            </form>
         </div>
         <!-- </div> -->
      </div>
      <div class="col-md-12 mrg-t-30">
         @if($is_player)
         <div class="table-responsive">
            <table id="myTable_player" class="table table-striped table-bordered table-sortable">
               <thead style="border: 2px solid #7c7777">
                  <tr>
                     <th class="lrt" data-field="Rank" data-sortable="true" style="border-right:1px solid white">Rank </th>
                     <th class="lrt" data-field="Team" data-sortable="true" style="border-right:1px solid white">Country</th>
                     <th class="lrt" data-field="Team" data-sortable="true" style="border-right:1px solid white">Name</th>
                     <th class="lrt" data-field="TotalPoints" data-sortable="true">Points</th>
                  </tr>
               </thead>
               <tbody id="table table-content" style="padding: 0px 22px!important">
                  @if(isset($player_data) && $player_data->isEmpty()) 
                  @endif
                  @foreach($player_data as $item)
                  <tr>
                     <td>{{$item->ranking}} </td>
                     <td>
                        <?php if(!empty($item->team_flag_link)){  ?>
                        <img src="{{strtolower($item->team_flag_link)}}"
                           onclick="window.open('{{$item->team_flag_link}}','_blank')" style="cursor:pointer" class="img-set">
                        {{$item->team}}
                        <?php }else {   ?>
                        <!-- <img src="{{ asset('assets/images/batsman.png') }}"
                           onclick="window.open('{{$item->team_flag_link}}','_blank')" style="cursor:pointer;     width: 50px;"> -->
                        {{$item->team}}
                        <?php } ?>
                     </td>
                     <td>
                        <?php if(!empty($item->player_image_link)){  ?>
                        <img src="{{$item->player_image_link}}" class="img-set"
                           onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer">
                        {{$item->player}}
                        <?php }else {   ?>
                        <?php  if($item->player_type_id == '2') { ?>
                        <img src="{{ asset('assets/images/batsman.png') }}"
                           onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer;     width: 50px;">
                        <?php } else if($item->player_type_id == '3') { ?>
                        <img src="{{ asset('assets/images/bowler.png') }}"
                           onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer;     width: 50px;">
                        <?php } else if($item->player_type_id == '4') {  ?>
                        <img src="{{ asset('assets/images/fielder.png') }}"
                           onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer;     width: 50px;">
                        <?php } else if($item->player_type_id == '5') {  ?>
                        <img src="{{ asset('assets/images/all rounder.png') }}"
                           onclick="window.open('{{$item->player_image_link}}','_blank')" style="cursor:pointer;     width: 50px;">
                        <?php } ?>
                        {{$item->player}}
                        <?php } ?>
                     </td>
                     <td>{{$item->points}}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         @else
         <table id="myTable_team" class="table table-striped table-bordered ">
            <thead>
               <tr>
                  <th class="lrt" data-field="Rank" data-sortable="true" style="border-right:1px solid white" >Rank</th>
                  <th class="lrt" data-field="Team" data-sortable="true" style="border-right:1px solid white" >Country</th>
                  <th class="lrt" data-field="Team" data-sortable="true" style="border-right:1px solid white" >Matches</th>
                  <th class="lrt" data-field="TotalPoints" data-sortable="true">Points</th>
               </tr>
            </thead>
            <tbody id="table table-content" style="padding:0px 12px">
               @if(isset($team_data) && $team_data->isEmpty()) 
               @endif
               @foreach($team_data as $item)
               <tr>
                  <td>{{$item->ranking}}</td>
                  <td><img src="{{strtolower($item->team_flag_link)}}" class="img-set"
                     onclick="window.open('{{$item->team_flag_link}}','_blank')" style="cursor:pointer">
                     {{$item->team}}
                  </td>
                  <td>{{$item->matches}} </td>
                  <td>{{$item->points}} </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         @endif
         <!--  @if($menuUrl != 'latest-ratings')
            {{-- <div>
                    @if(count($team_data) > 0)
                    {{$team_data->links('pagination::bootstrap-5')}}
            @endif
            @if(count($player_data) > 0)
            {{$player_data->appends(['p_type' => $payerId])->links('pagination::bootstrap-5')}}
            @endif
            </div> --}}
            @endif -->
         <div>
         </div>
      </div>
   </div>
   <?php }  ?>
   <style>
      .table-bordered {
      border-collapse: collapse;
      width: 100%;
      }
      .table-bordered th,
      .table-bordered td {
      border: 1px solid #7c7777;
      padding: 9px 16px;
      text-align: left;
      }
      .table-bordered th {
      background-color: black;
      -webkit-text-fill-color: black;
      }
      .table-sortable > thead > tr > th {
      cursor: pointer;
      position: relative;
      }
   </style>
   <div class="col-md-12 mrg-t-30">
      @if($is_player)
      <table id="myTable_player" class="table table-striped table-bordered " >
      </table>
      @else
      <table id="myTable_team" class="table table-striped table-bordered " >
      </table>
      @endif
      <!-- 
         @if($menuUrl != 'latest-ratings')
         <div>
             @if(count($team_data) > 0)
             {{$team_data->links('pagination::bootstrap-5')}}
             @endif
             @if(count($player_data) > 0)
             {{$player_data->appends(['p_type' => $payerId])->links('pagination::bootstrap-5')}}
             @endif
         </div>
         @endif -->
   </div>
   <!-- (request('year')==request('year'))? 'selected':'' -->
</section>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


{{-- <script type="text/javascript">
jQuery(document).ready(function(){
    var cat = $('.active-color').attr('id');
    var i;
    var year = 2024;
    var yearGet = '<?php echo request('year')?>';
    
    // Reverse loop from 2024 to 1877
    if (cat === '1') {
        for (i = 2024; i >= 1877; --i) {
            var active = '';
            if (i == yearGet) { 
                var active = 'selected'; 
            }
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    } else if (cat === '2') {
        // Loop from 1971 to 2024
        for (i = 1971; i <= 2024; ++i) {
            var active = '';
            if (i == yearGet) { 
                var active = 'selected'; 
            }
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    } else if (cat === '3') {
        // Loop from 2005 to 2024
        for (i = 2005; i <= 2024; ++i) {
            var active = '';
            if (i == yearGet) { 
                var active = 'selected'; 
            }
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    }
});

</script> --}}
<script type="text/javascript">
jQuery(document).ready(function(){
    var cat = $('.active-color').attr('id');
    var i;
    var year = 2023;
    var yearGet = '<?php echo request('year')?>';
    
    if (cat === '1') {
        for (i = 2023; i >= 1877; --i) {
            var active = (i === year) ? 'selected' : ''; // Set 'selected' for 2024
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    } else if (cat === '2') {
        for (i = 1971; i <= 2023; ++i) {
            var active = (i === year) ? 'selected' : ''; // Set 'selected' for 2024
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    } else if (cat === '3') {
        for (i = 2005; i <= 2023; ++i) {
            var active = (i === year) ? 'selected' : ''; // Set 'selected' for 2024
            $("#yearSelect").append('<option value="' + i + '" ' + active + '>' + i + '</option>');
        }
    }
});

</script>
