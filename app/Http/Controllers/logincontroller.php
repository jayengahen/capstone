<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class logincontroller extends Controller
{
    function login(Request $req)
    {

        $counts=0;
        $username = $req->input('username');
        $password = $req->input('password');
        $id = "";
            $val = DB::table('account')->where('acc_username',$username)->where('acc_password',$password)->get();
              foreach ($val as $s) 
                {
                  $id = $s->acc_id;
                }
   
            if(count($val) > 0)
            {
               $req->session()->put('ID',$id);
               $req->session()->put('name',$username);
               $req->session()->put('password',$password);


                $val2 = DB::table('clients')->where('acc_id',$id)->get();
                $val3 = DB::table('fashion_designer')->where('acc_id',$id)->get();
                $val4 = DB::table('tailor_shop')->where('acc_id',$id)->get();


                if(count($val2) > 0)
                {   

                   return redirect('/client-home');
                }
                else if(count($val3) > 0)
                {

                  return redirect('/fd-home-no-sub');

                }
                else if(count($val4) > 0)
                {

                  return redirect('/ts-home-no-sub');

                }
                  else 
                {

                  return redirect('/admin-home');

                }

            }
            else
            {

              return redirect('/login?r=invalid');

            }

     
    }

  



     function logout(Request $req)
    {

    $req->session()->flush();
    return redirect('/login');

     
    }



    public static function getFDinfo($args)
    { 
       $id ="";
       $username = $args;
       $val = DB::table('account')->where('acc_username',$username)->get();

       foreach ($val as $key) {
            
              $id = $key->acc_id;
       }

       $val2 = DB::table('fashion_designer')->where('acc_id',$id)->get();
       
       return $val2;


    }
 public static function getAdminInfo($args)
    { 
       $id ="";
       $username = $args;
       $val = DB::table('account')->where('acc_username',$username)->get();

       foreach ($val as $key) {
            
              $id = $key->acc_id;
       }

   
       
       return $id;


    }


      public static function getTSinfo($args)
    { 
       $id ="";
       $username = $args;
       $val = DB::table('account')->where('acc_username',$username)->get();

       foreach ($val as $key) {
            
              $id = $key->acc_id;
       }

       $val2 = DB::table('tailor_shop')->where('acc_id',$id)->get();
       
       return $val2;


    }
}
