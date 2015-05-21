@extends('layout')

@section('content')
<div class="container">
    <!-- 项目详情 -->
    <div class="project">
        <div class="row">
            <div class="col-md-9">
                <div class="project-item">
                    <h3>{{ $project->name }}</h3>
                    <div class="project-students">
                        @foreach ($project->students as $student)
                        {{ $student->name }}
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- /内容 -->
@endsection