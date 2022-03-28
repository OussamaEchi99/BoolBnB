@extends('layouts.app')

@section('content')
    <strong>Email arrivate per {{$location[0]->name}}</strong>
    @if (!$emails->isEmpty())
        @foreach ($emails as $email)
            <div class="card my-4">
                <div class="card-header">{{$email->object}}</div>
                <div class="card-body">
                    <div class="card-title"><strong>Da:</strong> {{$email->name}} ({{$email->email}})</div>
                    <p class="card-text">{{$email->message}}</p>
                </div>
            </div>
        @endforeach
    @else
        <div style="font-size: 30px">Non ci sono mail per questo appartamento</div>
    @endif
   
        
@endsection
