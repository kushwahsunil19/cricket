<?php
  
use Carbon\Carbon;
use App\Models\User;
use App\Models\Players;  
use App\Models\Team;  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}
  
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}

if (! function_exists('getProfileLogo')) {
    function getProfileLogo()
    {
    	//echo "sk";die;
    	 $result = User::where('type','admin')->first();

        return $result->profile_logo;
    }
}
if (! function_exists('getSocialLink')) {
    function getSocialLink()
    {
         $result = User::where('type','admin')->first();
         return $result;
    }
}