<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\EmailVerification;
use Mail;

class registerController extends Controller
{
    
    function insertClient(Request $req)
    {

        $counts=0;
    		$username = $req->input('username');
    		$password = $req->input('password');
    		$cpass = $req->input('cpass');
    		$fname = $req->input('fname');
    		$lname = $req->input('lname');
    		$mname = $req->input('mname');
    		$contact = $req->input('contact');
    		$add = $req->input('add');
    		$email = $req->input('email');
    		$id = '';



            $val = DB::table('clients')->where('c_email',$email)->get();
   			$val2 = DB::table('account')->where('acc_username',$username)->get();

              if(count($val) > 0 || count($val2) > 0)
              {
                echo "existed";
              }
              else
              {


              	$data = array(		'acc_username'=>$username,
                 					'acc_password'=>$password,
                 					'status'=> 1
                 					
                 			);

              	DB::table('account')->insert($data);

              	$val3 = DB::table('account')->where('acc_username',$username)->get();

              	foreach ($val3 as $s) 
              	{
              		$id = $s->acc_id;
              	}
    			

                 $data2 = array(	'acc_id'=>$id,
                 					'c_fname'=>$fname,
                 					'c_lname'=>$lname,
                 					'c_mname'=>$mname,
                 					'c_contact'=>$contact,
                 					'c_address'=>$add,
                 					'c_email'=>$email
                 				);


                  DB::table('clients')->insert($data2);

                  $user = $lname.", ".$fname;
				          MAIL::to($email)->send(new EmailVerification($user));
                   
                  return redirect('/email-confirm');                

              }
    }













   function insertFD(Request $req)
    {

        $username = $req->input('username');
        $password = $req->input('password');
        $cpass = $req->input('cpass');
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $mname = $req->input('mname');
        $add = $req->input('add');
        $con = $req->input('c1');
        $con2 = $req->input('c2');
        $con3 = $req->input('c3');
        $email = $req->input('email');

        $id = '';



            $val = DB::table('fashion_designer')->where('fd_email',$email)->get();
            $val2 = DB::table('account')->where('acc_username',$username)->get();

              if(count($val) > 0 )
              {
                return redirect('/register?r=existingemail');
              }
              else if(count($val2) > 0)
              {

                return redirect('/register?r=existinguser');

              }
              else
              {


                $data = array(    
                          'acc_username'=>$username,
                          'acc_password'=>$password,
                          'status'=> 1
                          
                      );

                DB::table('account')->insert($data);

                $val3 = DB::table('account')->where('acc_username',$username)->get();

                foreach ($val3 as $s) 
                {
                  $id = $s->acc_id;
                }
          

                 $data2 = array(  
                          'acc_id'=>$id,
                          'fd_fname'=>$fname,
                          'fd_lname'=>$lname,
                          'fd_mname'=>$mname,
                          'fd-contact1'=>$con,
                          'fd-contact2'=>$con2,
                          'fd-contact3'=>$con3,
                          'fd_address'=>$add,
                          'fd_email'=>$email
                        );


                  DB::table('fashion_designer')->insert($data2);
                  return redirect('/email-confirm');                

              }
    }







    function insertTS(Request $req)
    {

        $username = $req->input('username');
        $password = $req->input('password');
        $cpass = $req->input('cpass');
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $mname = $req->input('mname');
        $tsname = $req->input('tsname');
        $add = $req->input('address');
        $con = $req->input('con1');
        $con2 = $req->input('con2');
        $con3 = $req->input('con3');
        $email = $req->input('email');

        $id = '';



            $val = DB::table('tailor_shop')->where('ts_email',$email)->get();
            $val2 = DB::table('account')->where('acc_username',$username)->get();

              if(count($val) > 0 )
              {
                return redirect('/register2?r=existingemail');
              }
              else if(count($val2) > 0)
              {

                return redirect('/register2?r=existinguser');

              }
              else
              {


                $data = array(    
                          'acc_username'=>$username,
                          'acc_password'=>$password,
                          'status'=> 1
                          
                      );

                DB::table('account')->insert($data);

                $val3 = DB::table('account')->where('acc_username',$username)->get();

                foreach ($val3 as $s) 
                {
                  $id = $s->acc_id;
                }
          

                 $data2 = array(  
                          'acc_id'=>$id,
                          'ts_name'=>$tsname,
                          'ts_owner_fname'=>$lname,
                          'ts_owner_mname'=>$mname,
                          'ts_owner_lname'=>$lname,
                          'ts_contact1'=>$con,
                          'ts_contact2'=>$con2,
                          'ts_contact3'=>$con3,
                          'ts_address'=>$add,
                          'ts_email'=>$email
                        );


                  DB::table('tailor_shop')->insert($data2);
                  return redirect('/email-confirm');                

              }
    }



























    
    function confemail(Request $req)
    {

           		$conemail = $req->input('conf-email');


           		if($conemail == 'agnes')
           		{

           			
           				return redirect('/login?r=success');

           		}
           		else
           		{

           			return redirect('/email-confirm');
           		}

          
    }
}
