<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller {
	public function index()
	{
		$projects = Project::all();
		return view('projects.index')->withProjects($projects)->withTitle("实验班作品");
	}

	public function show($id)
	{
		$project = Project::find($id);
		$students = $project->students;
		return view('projects.show')->withProject($project)->withTitle('实验班作品');
	}
}
