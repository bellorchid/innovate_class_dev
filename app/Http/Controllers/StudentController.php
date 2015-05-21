<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



use App\Student;
use App\StudentDetail;
use App\Tag;
use App\Project;

class StudentController extends Controller {
	public function index(Request $request)
	{
		$students = Student::all();
		return view('students.index')->withStudents($students)->withTitle("实验班成员");

	}

	public function show($id)
	{
		$student = Student::find($id);
		$tags = $student->tags;
		$projects = $student->projects;
        return view('students.show')->withStudent($student)->withTitle("实验班成员");
	}

	// public function detail($id)
	// {
	// 	$student = StudentDetail::find($id);

	// }
	     // 登录页面
     public function login()
     {
          return view('students.login');
     }
 
     // 登录操作
     public function postLogin()
     {
          if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
              return Redirect::to('user/dashboard')
              ->with('message', '成功登录');
          } else {
              return Redirect::to('user/login')
                    ->with('message', '用户名密码不正确')
                    ->withInput();
          }
     }
 
}
