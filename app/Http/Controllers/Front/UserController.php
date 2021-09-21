<?php 

namespace App\Http\Controllers\Front;

use  App\Http\Controllers\Controller;

class UserController extends Controller{

    public function showUserName(){
        return 'Bashar Mohmmad';
    }

    public function getUndex(){

        // $date=[];//هذا الطريقه الثانيه افضل من الطريقه الاواله 
        // $data['id']=5;
        // $data['name'] = 'Bashar';
        // return view( 'Welcome',$data);
        


        // $obj = new \stdClass();//هذا الطريقه الثالثه افضل من الطريقه الاواله 
        // $obj -> name = 'ahmed';
        // $obj -> id = 5;
        // $obj -> gender = 'male';
        // return view( 'Welcome', compact('obj'));


        $data = ['ahmad', 'bassem'];
        return view( 'Welcome',compact('data'));
   
    }

}