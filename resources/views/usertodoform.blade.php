@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo Form</div>

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

                    <form method="POST" action="/userstodos" class="form-group">
                        @csrf
                        <label for="todo name">Name</label> <input type="text" name="todo_name" value="{{ old('todo_name') }}" class="form-control" /><br />
                        @error('todo_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo description">Description</label><textarea rows="4" cols="50" name="todo_desc" class="form-control" >{{ old('todo_desc') }}</textarea><br />
                        @error('todo_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo date">Date</label> <input type="date" name="todo_date" value="{{ old('todo_date') }}" class="form-control" /><br />
                        @error('todo_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <label for="todo time">Time</label> <input type="time" name="todo_time" value="{{ old('todo_time') }}" class="form-control" /><br />
                        @error('todo_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <input type="submit" value="Add" class="form-control" />
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
