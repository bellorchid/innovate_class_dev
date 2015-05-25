@extends('admin')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="profiles">
                <div class="profile-personal">
                    <img src="{{ asset('images/icons/chrome-logo-small.jpg')}}" alt="加载失败" class="ico-personal">
                    <h2 class="name-detail">{{ $student->name }} <small>{{ $student->description}}</small></h2>
                    <p class="tag-detail">{{$student->tags}}</p>

                    <div class="personal-detail">
                        <div class="form-group">
                            <label for="id">学号：{{ $student->id }}</label>
                        </div>

                        <div class="form-group">
                            <label for="id">姓名：</h3>{{ $student->name }}</h3></label>
                        </div>

                        <div class="form-group">
                            <label for="id">手机号：{{ $student->tel }}</label>
                        </div>

                        <div class="form-group">
                            <label for="id">邮件：{{ $student->email }}</label>
                        </div>

                        <div class="form-group">
                            <label for="id">详细信息：{{ $student->resume }}</label>
                        </div>
                    </div>
                </div>

                <div class="personal-project">
                    <div class="project-box">            
                        <h2>参与的项目</h2>
                        <ul>

                        </ul>
                    </div>
                    <div class="project-box">            
                        <h2>发表的博文</h2>
                        <ul>

                        </ul>
                    </div>
                    <!-- Todo -->
                    <div class="project-box">            
                        <h2>计划的任务</h2>
                        <section id="todoapp">
                                <input
                                    id="new-todo"
                                    autofocus
                                    autocomplete="off"
                                    placeholder="What needs to be done?"
                                    v-model="newTodo"
                                    v-on="keyup:addTodo | key enter"
                                >
                            <section id="main" v-show="todos.length" v-cloak>
                                <input
                                    id="toggle-all"
                                    type="checkbox"
                                    v-model="allDone"
                                >
                                <ul id="todo-list">
                                    <li
                                        class="todos"
                                        v-repeat="todos | filterTodos"
                                        v-class="
                                            completed : completed,
                                            editing   : this == editedTodo
                                        "
                                    >
                                        <div class="view">
                                            <input
                                                class="toggle"
                                                type="checkbox"
                                                v-model="completed"
                                            >
                                            <label v-text="title" v-on="dblclick: editTodo(this)"></label>
                                            <button class="destroy" v-on="click: removeTodo(this)"></button>
                                        </div>
                                        <input
                                            class="edit"
                                            type="text"
                                            v-model="title"
                                            v-todo-focus="this == editedTodo"
                                            v-on="
                                                blur  : doneEdit(this),
                                                keyup : doneEdit(this) | key enter,
                                                keyup : cancelEdit(this) | key esc
                                            "
                                        >
                                    </li>
                                </ul>
                            </section>
                            <footer id="footer" v-show="todos.length" v-cloak>
                                <ul id="filters">
                                    <li><a href="#/all" v-class="selected: activeFilter == 'all'">All</a></li>
                                    <li><a href="#/active" v-class="selected: activeFilter == 'active'">Active</a></li>
                                    <li><a href="#/completed" v-class="selected: activeFilter == 'completed'">Completed</a></li>
                                </ul>
                            </footer>
                        </section>
                    </div>
                    <!-- Todo -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection