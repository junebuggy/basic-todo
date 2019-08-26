@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Edit Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('userstodos.update', $userstodo->id) }}" class="form-group">
                        @method('PATCH') 
                        @csrf
                        <label for="todo name">Name</label> <input type="text" name="todo_name" value="{{$userstodo->task}}" class="form-control" /><br />
                        @error('todo_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo description">Description</label><textarea rows="4" cols="50" name="todo_desc" class="form-control" >{{$userstodo->task_description}}</textarea><br />
                        @error('todo_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo date">Date</label> <input type="date" name="todo_date" value="{{$userstodo->scheduled_date}}" class="form-control" /><br />
                        @error('todo_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo time">Time</label> <input type="time" name="todo_time" value="{{$userstodo->scheduled_time}}" class="form-control" /><br />
                        @error('todo_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <input type="submit" value="Edit" class="form-control"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
