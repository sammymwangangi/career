@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
        @if(Auth::user()->isAdmin())
            <div class="panel panel-default">
                <div class="panel-heading">Welcome! Here are some Statistics about our system.</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{ $questions }}</h1>
                            Total Questions
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $users }}</h1>
                            users registered
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $quizzes }}</h1>
                            Tests taken
                        </div>
                        
                    </div>
                </div>
            </div>
            @endif
            @if(!Auth::user()->isAdmin())
            <a href="{{ route('tests.index') }}" class="btn btn-success">Take a new quiz!</a>
            @endif
        </div>
    </div>
    <br><br>
    <div class="panel panel-default">

        <div class="panel-body">
            <p>gjfdgdfgkf hgfh</p>
        </div>
        
    </div>

@endsection
