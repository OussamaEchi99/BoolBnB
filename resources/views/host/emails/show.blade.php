@extends('layouts.app')

@section('content')
    
    <div class="container">
        @if (!$emails->isEmpty())
        <h4>Email ricevute per <strong>{{strtoupper($location[0]->name)}} : {{count($emails)}}</strong></h4>
            @foreach ($emails as $email)
                <div class="card my-4">
                    <div class="card-header"><strong>Oggetto:</strong> {{$email->object}}</div>
                    <div class="card-body">
                        <div class="card-title"><strong>Da:</strong> {{$email->name}} ({{$email->email}})</div>
                        <p class="card-text"><strong>Messaggio:</strong> {{$email->message}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div style="font-size: 30px">Non ci sono email per questa location</div>
        @endif
    </div>

@endsection
