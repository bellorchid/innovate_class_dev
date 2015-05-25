<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Auth;
use Redirect;


use App\Student;
use App\StudentDetail;
use App\Tag;
use App\Project;

class StudentController extends Controller {

  //非登录用户显示学生纵览页
	public function index(Request $request)
	{
		$students = Student::all();
		return view('students.index')->withStudents($students)->withTitle("实验班成员");
    // return json_encode($students); //测试数据

	}

  //非登录用户显示个人详细页面
	public function show($id)
	{
		$student = Student::find($id);
		$tags = $student->tags;
		$projects = $student->projects;
        return view('students.show')->withStudent($student)->withTitle("实验班成员");
	}

  //显示登陆页界面
  public function loginGet()
  {
    return view('students.login');

  }

  //登录数据处理
  public function loginPost(Request $request)
  {
      $this->validate($request, Student::rules());
      $id = $request->get('id');
      $password = $request->get('password');
      if (Auth::attempt(['id' => $id, 'password' => $password], $request->get('remember'))) {
          // if (!Auth::students()->is_admin) {
          //     return Redirect::route('stu_home');
          // } else {
          //     return Redirect::action('Admin\AdminController@index');
          // }  
        /*第一期暂时不需要教师管理员账户，所以不需要判断是否为教师用户*/
        return Redirect::route('stu_home');

      } else {
          return Redirect::route('login')
              ->withInput()
              ->withErrors('学号或者密码不正确，请重试！');
      }
  }

  //用户登出操作
  public function logout()
  {
      if (Auth::check()) {
          Auth::logout();
      }
      return Redirect::route('login');
  }

  // //只允许登录用户访问个人详细页,目前会出现重定向问题
  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }

  //显示用户的个人详细页
  public function home()
  {
    $student = Auth::user();
    $id = Auth::user()->id;
    $detail = StudentDetail::find($id);
    return view('admin.index')->withTitle("个人页面")->withStudent($student)->withDetail($detail);
  }

  //显示学生修改页
  public function edit()
  {

  }

  //更新学生个人信息
  public function update()
  {

  }

  //安卓接口测试方法，
  public function test()
  {
    return response()->json(['name' => 'Abigail', 'state' => 'CA']);
  }

 
  public function insert() {
    $student = Student::find('12345678');
    $project = project::find('12108238');

    $student->projects()->attach($project->id);

    // print_r($project);
  }


}
