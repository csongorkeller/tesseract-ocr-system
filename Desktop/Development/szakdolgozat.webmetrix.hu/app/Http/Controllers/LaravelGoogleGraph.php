<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 

class LaravelGoogleGraph extends Controller
{
    // -----------------------------------------PieChart CONTROLLER--------------------------------------
    function index()
    {
    	$data= DB::table('calldb')
    			-> select(
    				DB::raw('jobid as jobid'),
    				DB::raw('count(*) as number'))
    			->groupBy('jobid')
    			->get();
    	$array[]=['JobID','Number'];
    	foreach ($data as $key => $value) 

    	{
    		
    		$array[++$key] = [$value -> jobid , (int)$value -> number];
    	}
    	//$array= [["JobID","Number", "test"],["143",5],["144",5],["145",5000],["146",5000]];
    	//dd($array);
    	

    	    return view('google_pie_chart') -> with('jobid', json_encode($array));
    }






    //-----------------------------------------LineChart CONTROLLER--------------------------------------
    function linechart()
    {

		 $visitor = DB::table('calldb')
                    ->select(
                        DB::raw("starttime as year"),
                        DB::raw("dialtonetime as dialtonetime"),
                        DB::raw("dialtime as dialtime"),
                        DB::raw("calltime as calltime")) 
                    ->orderBy("starttime")
                    ->groupBy(DB::raw("minute(starttime)"))
                    ->get();


        $result[] = ['Év','Dialtone time', 'Dialtime','Calltime'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->dialtonetime, (int)$value->dialtime, (int)$value->calltime];
        }
        
		//dd($result);

        return view('google_line_chart')
                ->with('visitor',json_encode($result));



	}

	//-----------------------------------------SankeyChart CONTROLLER--------------------------------------
    function sankeychart()
    {
	 	$visitor = DB::table('calldb')
                    ->select(
                        DB::raw("anumber as anumber"),
                        DB::raw("bnumber as bnumber"),
                        DB::raw("AVG(calltime) as calltime"))
                    ->groupBy("anumber", "bnumber")
                    
                    ->get();


        $result[] = ['A number','B number','Calltime'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [(string)$value->anumber, (string)$value->bnumber, (int)$value->calltime];
        }

        //$result= [["JobID","Number", "test"],["143","144",5],["144","145",5],["145","146",5],["146","147",5]];
        
        //dd($result);

        return view('google_sankey_chart')
                ->with('callroute',json_encode($result));

    }

 	//-----------------------------------------Number CONTROLLER--------------------------------------  
 	
 	function SumPlength()

	 {
	 	
	 	$visitor = DB::table('calldb')
	 				-> select(
	 					DB::raw("SUM(plength) as plength"))
	 				->get();
	 	$result[] = ['Sum of Planned length'];
	 	foreach ($visitor as $key => $value) {

	 		$result[++$key] = [(int)$value->plength];
	 	}
	 	//dd($result);
	 	return view('sum_plength')
                ->with('analytics',json_encode($result));
	 } 

 	//-----------------------------------------Annotiation chart CONTROLLER--------------------------------------  	 

	function AnnotiationChart()
    {
	 	$visitor = DB::table('calldb')
                    ->select(
                    	DB::raw("starttime as starttime"),
                        DB::raw("anumber as anumber"),
                        DB::raw("bnumber as bnumber"),
                        DB::raw("calltime as calltime"))
                    ->get();


        $result[] = ['A number','B number','Calltime'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->starttime, (string)$value->anumber, (string)$value->bnumber, (int)$value->calltime];
        }

        //$result= [["JobID","Number", "test"],["143","144",5],["144","145",5],["145","146",5],["146","147",5]];
        
        //dd($result);

        return view('google_annotiation_chart')
                ->with('visitor',json_encode($result));

    }


    function googleDataTable()
    {
        $visitor = DB::table('calldb')
                    ->select(
                        DB::raw("starttime as starttime"),
                        DB::raw("anumber as anumber"),
                        DB::raw("bnumber as bnumber"),
                        DB::raw("calltime as calltime"))
                    ->get();


        $result[] = ['A number','B number','Calltime'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->starttime, (string)$value->anumber, (string)$value->bnumber, (int)$value->calltime];
        }

        //$result= [["JobID","Number", "test"],["143","144",5],["144","145",5],["145","146",5],["146","147",5]];
        
        //dd($result);

        return view('google_data_table')
                ->with('visitor',json_encode($result));

    }





}












