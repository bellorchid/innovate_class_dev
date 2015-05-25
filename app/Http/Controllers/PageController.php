<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Student;
use App\Project;
use App\Tag;

class PageController extends Controller {
    public function home()
    {
        $students = Student::take(12)->get();
        $projects = Project::take(5)->get();

        return view('pages.home')->withStudents($students)->withProjects($projects)->withTitle("首页");
    }
}
