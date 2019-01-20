<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    function getAccounts()
    {


    		$data['data'] = DB::table('account')->where('status',1)->get();
    		if(count($data) > 0)
    		{

    			return view('pages/admin/oldaccounts',$data);
    		}
    		else
    		{

    			return view('pages/admin/oldaccounts');

    		}
    }


    
    function getRequests()
    {

            $id = session()->get('ID');
            $data['data'] = DB::table('requests')->where('req_acc_owner',$id)->get();
            if(count($data) > 0)
            {

                return view('pages/client/request',$data);
            }
            else
            {

                return view('pages/client/request');

            }
    }
      function getRequestsAdmin()
    {


            $data['data'] = DB::table('requests')->where('req_status',1)->get();
            if(count($data) > 0)
            {

                return view('pages/admin/requests',$data);
            }
            else
            {

                return view('pages/admin/requests');

            }
    }


}
