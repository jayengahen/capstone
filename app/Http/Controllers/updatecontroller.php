<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class updatecontroller extends Controller
{
    //
	function updateAdmin(Request $req)
    {

    	$id = $req->input('id');
    	$username = $req->input('username');
    	$password = $req->input('password');
    	$cpass =    $req->input('cpass');

    	if($username != "" && $password != "" && $cpass != "")
    	{

    		    $data = array(
                        'acc_username'=>$username,
                 				'acc_password'=>$password,
                 				'status'=> 0
                 					
                 			);

              	DB::table('account')->where('acc_id',$id)->update($data);

              	$req->session()->flush();

              	 $req->session()->put('name',$username);
    			 $req->session()->put('password',$password);


              	return redirect('/admin-profile');

    	}
    	else
    	{
        $error = 'update failed';

    		return redirect('/admin-profile');
    	}


    }


      function updateFD(Request $req)
    {

      $id = $req->input('id');
      $username = $req->input('username');
      $password = $req->input('password');
      $cpass =    $req->input('cpass');
      $email =    $req->input('email');
      $fname =    $req->input('fname');
      $lname =    $req->input('lname');
      $mname =    $req->input('mname');
      $address =    $req->input('add');
      $c1 =    $req->input('c1');
      $c2 =    $req->input('c2');
      $c3 =    $req->input('c3');




      if($username != "" && $password != "" && $cpass != "" && $email != "" && $fname != "" && $lname != "" && $mname != "")
      {

            $data = array(
                        'acc_username'=>$username,
                        'acc_password'=>$password,
                        'status'=> 1    
                      );

                DB::table('account')->where('acc_id',$id)->update($data);


            $data2 = array(

                      'fd_fname' => $fname,
                      'fd_lname' => $lname,
                      'fd_mname' => $mname,
                      'fd_contact1' => $c1,
                      'fd_contact2' => $c2,
                      'fd_contact3' => $c3,
                      'fd_address' => $address,
                      'fd_email' => $email

                       );

                DB::table('fashion_designer')->where('acc_id',$id)->update($data2);


                 $req->session()->flush();

                $req->session()->put('name',$username);
                $req->session()->put('password',$password);


                return redirect('/fd-profile');

      }
      else
      {
        
        echo "takte"."<br>";
        echo $username."<br>";
        echo $password."<br>";
        echo $fname."<br>";
        echo $mname."<br>";
        echo $lname."<br>";
        echo $c1."<br>";
        echo $c2."<br>";
        echo $c3."<br>";
        echo $address."<br>";




        
      }


    }


///-----------------------------------------------------

     function updateTS(Request $req)
    {

      $id = $req->input('id');
      $username = $req->input('username');
      $password = $req->input('password');
      $cpass =    $req->input('cpass');
      $tsname =    $req->input('cpass');
      $email =    $req->input('email');
      $fname =    $req->input('fname');
      $lname =    $req->input('lname');
      $mname =    $req->input('mname');
      $address =    $req->input('add');
      $c1 =    $req->input('c1');
      $c2 =    $req->input('c2');
      $c3 =    $req->input('c3');




      if($username != "" && $password != "" && $cpass != "" && $email != "" && $fname != "" && $lname != "" && $mname != "" && $tsname != "")
      {

            $data = array(
                        'acc_username'=>$username,
                        'acc_password'=>$password,
                        'status'=> 1      
                      );

                DB::table('account')->where('acc_id',$id)->update($data);


            $data2 = array(
                      'ts_name' => $tsname,
                      'ts_owner_fname' => $fname,
                      'ts_owner_mname' => $lname,
                      'ts_owner_lname' => $mname,
                      'ts_contact1' => $c1,
                      'ts_contact2' => $c2,
                      'ts_contact3' => $c3,
                      'ts_address' => $address,
                      'ts_email' => $email

                       );

                DB::table('tailor_shop')->where('acc_id',$id)->update($data2);


                 $req->session()->flush();

                $req->session()->put('name',$username);
                $req->session()->put('password',$password);


                return redirect('/ts-profile');

      }
      else
      {
        
        echo "takte"."<br>";
        echo $username."<br>";
        echo $tsname."<br>";
        echo $password."<br>";
        echo $fname."<br>";
        echo $mname."<br>";
        echo $lname."<br>";
        echo $c1."<br>";
        echo $c2."<br>";
        echo $c3."<br>";
        echo $address."<br>";




        
      }


    }




}
