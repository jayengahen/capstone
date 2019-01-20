<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class ajax extends Controller
{
 



	function checkUser(Request $req)
	{

		
		if($req->get('username'))
		{
			$username = $req->get('username');
			$data = DB::table('account')->where('acc_username',$username)->get();


			if(count($data) > 0)
			{

				return "true";
			}
			else
			{
				return "false";
			}


		}

	}


	function checkEmail(Request $req)
	{

		
		if($req->get('email'))
		{
			$email = $req->get('email');
			$data = DB::table('fashion_designer')->where('fd_email',$email)->get();
			$data2 = DB::table('clients')->where('c_email',$email)->get();
			$data3 = DB::table('tailor_shop')->where('ts_email',$email)->get();

			if(count($data) > 0 || count($data2) > 0 || count($data3) > 0)
			{

				return "true";
			}
			else
			{
				return "false";
			}


		}

	}




	function checkTsname(Request $req)
	{

		
		if($req->get('tsname'))
		{
			$tsname = $req->get('tsname');
			
			$data = DB::table('tailor_shop')->where('ts_name',$tsname)->get();

			if(count($data) > 0 )
			{

				return "true";
			}
			else
			{
				return "false";
			}


		}

	}




	function gatherData(Request $req)
	{
      $fname = "";
	 $arrayName = array(10);
	 	
		if($req->get('id'))
		{
			$id = $req->get('id');
			$data = DB::table('fashion_designer')->where('acc_id',$id)->get();
			$data2 = DB::table('clients')->where('acc_id',$id)->get();
			$data3 = DB::table('tailor_shop')->where('acc_id',$id)->get();

			if(count($data) > 0 )
			{

					foreach ($data as $key) 
					{
					  $arrayName[0] =  $key->fd_fname;
					  $arrayName[1] =  $key->fd_mname;
					  $arrayName[2] =  $key->fd_lname;
					  $arrayName[3] =  "Fashion Designer";
					  $arrayName[4] =  "N/A";
					  $arrayName[5] =  "None";
					  $arrayName[6] =  $key->fd_email;
					  $arrayName[7] =  $key->fd_address;



					}
				return $arrayName;
			}
			
			else if(count($data2) > 0)
			{
				
					foreach ($data2 as $key) 
					{

					  $arrayName[0] =  $key->c_fname;
					  $arrayName[1] =  $key->c_mname;
					  $arrayName[2] =  $key->c_lname;
					  $arrayName[3] =  "Client";
					  $arrayName[4] =  "None";
					  $arrayName[5] =  $key->c_email;
					  $arrayName[6] =  $key->c_address;
					  
					}
				return $arrayName;
			}
			else if(count($data3) > 0)
			{
				
					foreach ($data3 as $key) 
					{

					  $arrayName[0] =  $key->ts_owner_fname;
					  $arrayName[1] =  $key->ts_owner_mname;
					  $arrayName[2] =  $key->ts_owner_lname;
					  $arrayName[3] =  "Tailor Shop";
					  $arrayName[4] =  "N/A";
					  $arrayName[5] =  "None";
					  $arrayName[6] =  $key->ts_name;
					  $arrayName[7] =  $key->ts_email;
					  $arrayName[8] =  $key->ts_address;

					  
					}
				return $arrayName;
			}
			
		}

	}



	function gatherReq(Request $req)
	{

		
		if($req->get('id'))
		{
			$id = $req->get('id');
			$arrayName = array(10);
			$data = DB::table('requests')->where('req_id',$id)->get();

			if(count($data) > 0 )
			{
					foreach ($data as $key) 
					{

					  $arrayName[0] =  $key->req_for;
					  $arrayName[1] =  $key->req_details;
					  $arrayName[2] =  $key->req_date;
					  $arrayName[3] =  $key->req_respondents;
					

					}

				return $arrayName;
			}
			

		}

	}




}
