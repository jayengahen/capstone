<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class requestController extends Controller
{
       function add_request(Request $req)
    {
      $acc_id = $req->input('acc_owner');
      $req_for = $req->input('req_for');
      $req_details = $req->input('req_details');
      $date = $req->input('date');




        $data = array(    'req_acc_owner'=>$acc_id,
                          'req_for'=>$req_for,
                          'req_details'=> $req_details,
                          'req_date'=> $date,

                          'req_status'=> 1,
                          'req_respondents'=> 0

                          
                      );

                DB::table('requests')->insert($data);

                 return redirect('/client-request');

    }

    function del_request(Request $req)
    {

      $req_id = $req->input('deleteID');
  

               DB::table('requests')->where('req_id',$req_id)->delete();

                 return redirect('/client-request');

    }
}
