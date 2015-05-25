@extends('layout')

@section('content')
<div class="container">
</br></br></br>
    <!-- 学生详情 -->
    <div class="student">
        <div class="row">
            <div class="col-md-9">
                <div class="student-item">
                    <img class="icon" src={{asset('images/icons/chrome-logo-small.jpg')}} /> <h3>{{ $student->name }}</h3>
                    <div class="tags">
                        @foreach ($student->tags as $tag)
                        {{ $tag->name }}
                        @endforeach
                    </div>
                    <hr class="divider" />
                    <li>邮箱: {{ $student->email }}</li>
                    <li>手机号: {{ $student->detail->tel }}</li>
                    <li>GitHub: <a href="{{ $student->detail->github }}">{{ $student->detail->github }}</a></li>
                    <hr class="divider" />
                    <p>{{ $student->detail->resume }}</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="student-project">
                    <h3>参与项目</h3>
                    <hr class="divider" />
                    <ul>
                    @foreach ($student->projects as $project)
                        <a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- /内容 -->
@endsection