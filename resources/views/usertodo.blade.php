@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Dash</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button onclick="window.location.href = '/userstodos/create';">Add a Todo</button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                              <td>Name</td>
                              <td>Description</td>
                              <td>Date</td>
                              <td>Time</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->UsersTodo as $userTodo)
                            <tr>
                                <td>{{$userTodo->id}}</td>
                                <td>{{$userTodo->task}}</td>
                                <td>{{$userTodo->task_description}}</td>
                                <td>{{$userTodo->scheduled_date}}</td>
                                <td>{{$userTodo->scheduled_time}}</td>
                                <td>
                                    <a href="{{ route('userstodos.edit',$userTodo->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('userstodos.destroy', $userTodo->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
