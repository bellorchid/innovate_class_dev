@extends('layout')

@section('content')
<div class="container">
	            <div class="projects-index">
                <div class="row">
                    @foreach ($projects as $project)
                    <div class="col-md-12">
                        <div class="project-item">
                            <a href="{{url('/projects/'.$project->id)}}"><h3>{{ $project->name }}</h3></a>
                        </div>
                    </div>
                    @endforeach
</div>
</div>
@endsection