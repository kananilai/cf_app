@extends('layouts.app')

@section('content')
<div class="row justify-content-around">
    @foreach($wods as $wod)
    <div class="mr-1 col-lg-4 col-md-6 pb-4 col-md-5 col-sm-5 mx-auto text-center" >
        <div class="card">
            <div class="card-body px-0 rounded border border-dark shadow">
                <h5 class="card-title text-center pb-2" style="font-family: 'M PLUS Rounded 1c', sans-serif; font-size:2em;">{{ $wod['date'] ->format('m月d日') }}</h5>
                <p class="card-text text-center" style="font-size:1.5em;">{{ $wod['title'] }}</p>
                <a href="/showWod/{{ $wod['id'] }}" class="btn btn-outline-secondary d-block m-auto w-50">More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
