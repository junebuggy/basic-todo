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

                    <form method="POST" action="/userstodos">
                        @csrf
                        <label for="todo name">Name</label> <input type="text" name="todo_name" /><br />
                        <label for="todo description">Description</label><textarea rows="4" cols="50" name="todo_desc"></textarea><br />
                        <label for="todo date">Date</label> <input type="date" name="todo_date" /><br />
                        <label for="todo time">Time</label> <input type="time" name="todo_time" /><br />
                        <input type="submit" value="Add" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
