<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use DateTime;

class AdminController extends Controller
{
	public function login(Request $request){
		if ($request -> isMethod('post')) {
			$data = $request->input();
			if (\Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])) {
				return redirect('admin/dashboard');
			}
			else {
				//echo "Failed";die;
				return redirect('/admin') -> with('flash_message_error','Invalid Username or Password');
			}
		}


		return view ('admin.admin_login');
	}





	
//---------------------------Chart Controller----------------------------------------

	public function dashboard() {

		return view ('admin.dashboard')->with([
			'visitor' => $this->generateLineChart(),
			'jobid' => $this->generatePieChart(),
			'callroute' => $this->generateSankeyChart(),
			'sumplength' => $this->generateSumPlength(),
            'jobIdDialtoneTime' => $this->generateCallDataByJobId(),
            'callDataByNumber' => $this->generateCallDataByNumber(),
            'generateJobIdTimeline' => $this->generateJobIdTimeline(),
		]);
	}





	public function generateLineChart()
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

    	return json_encode($result);
    }




	public function generatePieChart()
    {
    	$data= DB::table('calldb')
    			-> select(
    				DB::raw("jobid as jobid"),
    				DB::raw("count(*) as number"))
    			->groupBy("jobid")
    			->get();
    	$array[]=['JobID','Number'];
    	foreach ($data as $key => $value) 

    	{
    		
    		$array[++$key] = [$value->jobid , (int)$value->number];
    	}
    	//$array= [["JobID","Number", "test"],["143",5],["144",5],["145",5000],["146",5000]];
    	    //dd($array);	

    	    return json_encode($array);
    }

    


    public function generateSankeyChart()
    {
	 	$visitor = DB::table('calldb')
                    ->select(
                        DB::raw("anumber as anumber"),
                        DB::raw("bnumber as bnumber"),
                        DB::raw("AVG(calltime) as calltime"))
                    ->groupBy("anumber", "bnumber")
                    
                    ->get();


        $result[] = ['A number','B number','AVG Calltime'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [(string)$value->anumber, (string)$value->bnumber, (int)$value->calltime];
        }

        //$result= [["JobID","Number", "test"],["143","144",5],["144","145",5],["145","146",5],["146","147",5]];
        
        //dd($result);

        return json_encode($result);

    }




    public function generateSumPlength()

	 {
	 	
	 	$sumplength = DB::table('calldb')
	 				-> select(
	 					DB::raw("SUM(plength) as plength"))
	 				->get();
	 	$result[] = ['Sum of Planned length'];
	 	foreach ($sumplength as $key => $value) {

	 		$result[++$key] = [(int)$value->plength];
	 	}
	 	//dd($result);

	 	return json_encode($result);
	 } 




     public function generateCallDataByJobId()
    {
        $jobIdDialtoneTime = DB::table('calldb')
                    ->select(
                        DB::raw("jobid as jobid"),
                        DB::raw("avg(dialtonetime) as dialtonetime"),
                        DB::raw("avg(dialtime) as dialtime"),
                        DB::raw("avg(calltime) as calltime")) 
        
                    ->groupBy("jobid")
                    ->get();


        $result[] = ['JobID','AVG Dialtone time', 'AVG Dialtime','AVG Calltime'];
        foreach ($jobIdDialtoneTime as $key => $value) {
            $result[++$key] = [$value->jobid, (int)$value->dialtonetime, (int)$value->dialtime, (int)$value->calltime];
        }
        //dd($result);

        return json_encode($result);
    }


         public function generateCallDataByNumber()
    {
        $callDataByNumber = DB::table('calldb')
                    ->select(
                        DB::raw("anumber as anumber"),                    
                        DB::raw("avg(dialtonetime) as dialtonetime"),
                        DB::raw("avg(dialtime) as dialtime"),
                        DB::raw("avg(calltime) as calltime")) 
                  ->groupBy("anumber")
                    ->get();


        $result[] = ['A number','AVG Dialtone time', 'AVG Dialtime','AVG Calltime'];
        foreach ($callDataByNumber as $key => $value) {
            $result[++$key] = [$value->anumber, (int)$value->dialtonetime, (int)$value->dialtime, (int)$value->calltime];
        }

        return json_encode($result);
    }



           public function generateJobIdTimeline()
    {
        $generateJobIdTimeline = DB::table('calldb')
                    ->select(
                        DB::raw("jobid as jobid"),                    
                        DB::raw("min(starttime) as minstarttime"),
                        DB::raw("max(starttime) as maxstarttime"))
                  ->groupBy("jobid")
                    ->get();


        $result[] = ['JobID','Minimum starttime', 'Maximum starttime'];
        foreach ($generateJobIdTimeline as $key => $value) {
        $result[++$key] = [(string)$value->jobid, (new DateTime($value->minstarttime))->getTimestamp()*1000, (new DateTime($value->maxstarttime)) ->getTimestamp()*1000];
                
                }

        //dd($result);

        return json_encode($result);
    }
     	


 


}