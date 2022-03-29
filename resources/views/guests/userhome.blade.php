@extends('layouts.app')

@section('content')
    <div>
        {{Auth::id()}}
        <Hostapp/>
    </div>
@endsection