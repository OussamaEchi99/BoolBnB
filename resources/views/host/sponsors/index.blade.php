@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($locations as $location)
        <div class="row location">
            <div class="col-6">
                <a href="#">{{ $location->name }}</a>
            </div>

            <div class="col-6 d-flex">
                @foreach ($sponsors as $sponsor)
                    <div class="mx-4">
                        <a class="subscription $sponsor->subscription ? $sponsor->subscription : '' " href="#">{{ $sponsor->subscription }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection

<style>
    .location{
        border: 1px solid lightgray;
        padding: 15px 15px;
        border-radius: 25px;
    }

    .subscription{
        border: 1px solid lightgray;
        padding: 6px 15px;
        border-radius: 25px;
    }

    .gold{
        background-color: yellow;
    }

</style>