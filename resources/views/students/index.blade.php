@extends('layout')

@section('content')
<!-- 内容 -->
<div class="container">
    <!-- 学生简介 -->
    <div class="students-list">
        <div class="row">
            @foreach ($students as $student)
            <div class="col-md-4">
                <div class="student-item">
                    <h3>{{ $student->name }}</h3>
                    <li>{{ $student->id }}</li>
                    <li>{{ $student->email }}</li>
                    <li>{{ $student->password }}</li>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div><!-- /内容 -->
@endsection