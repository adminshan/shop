<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;

class UserController extends Controller
{
    //
	public function bcd(){
		echo '<pre>';dump($_POST);dump($_GET);echo '</pre>';
	}
	public function user($uid)
	{
		echo $uid;
	}

	public function test()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
    }

	public function add()
	{
		$data = [
			'name'      => str_random(5),
			'age'       => mt_rand(20,99),
			'email'     => str_random(6) . '@gmail.com',
			'reg_time'  => time()
		];

		$id = UserModel::insertGetId($data);
		var_dump($id);
	}
	public function showlist(){
		$list = UserModel::all()->toArray();
		$data = [
				'title'     => 'abc',
				'list'      => $list
		];

		return view('test.child',$data);
	}
}
