@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="row  col-lg-7 col-sm-10">
            <div class="card mx-auto text-center shadow" style="width:100%; margin-bottom:20px; border:2px solid black;">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size: 3em; font-weight:bold; font-family: 'M PLUS Rounded 1c', sans-serif;">{{ $wod['date']->format('m月d日') }}</h5>
                    <p class="card-text text-center" style="font-size: 2em; font-family: 'M PLUS Rounded 1c', sans-serif;">{{ $wod['title'] }}</p>
                    <p class="card-text text-center" style="font-size: 1.5em; font-family: 'M PLUS Rounded 1c', sans-serif;">{!! nl2br(htmlspecialchars($wod['content'])) !!}</p>

                </div>
            </div>
            @foreach($records as $record)
            <div class="card mx-auto text-center m-2 col-lg-5 col-sm-11" style="width:120%;">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    <h5 class="card-title " style="font-family: 'M PLUS Rounded 1c', sans-serif; background:linear-gradient(transparent 70%, #20b2aa 0%);">{{ $record['name']}}</h5>
                    <p class="card-text " style="font-family: 'M PLUS Rounded 1c', sans-serif;">{{ $record['created_at']->format('m.d')  }}</p>
                    </div>
                    <p class="card-text text-left" style="font-family: 'M PLUS Rounded 1c', sans-serif;"><span style="font-size:1.2em;">Score： </span>{{ $record['score'] }}</p>
                    <p class="card-text text-left" style="font-family: 'M PLUS Rounded 1c', sans-serif;"> Comment<br>{{ $record['comment'] }}</p>
                    <p class="card-text text-center" style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                        @if($record['feeling'] == 1)
                            <i class="far fa-grin-hearts fa-2x" style="color:#ff1493;"></i>
                        @elseif($record['feeling'] == 2)
                            <i class="far fa-meh fa-2x" style="color:#ffd700;"></i>
                        @elseif($record['feeling'] == 3)
                            <i class="far fa-dizzy fa-2x" style="color:#0000ff;"></i>
                        @endif
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="border border-dark  rounded p-2 w-50 mx-auto shadow-lg col-lg-5 col-sm-12 h-75" style="background-color:#00477741">
            <form method="post" action="/storeRecord/{{ $wod['id'] }}">
                @csrf
                <input type='hidden' name='wod_id' value="{{ $wod['id'] }}">
                <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
                <input type='hidden' name='name' value="{{ Auth::user()->name }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Score</label>
                    <input type="text"  class="form-control" id="score" name="score" required>
                </div>
                <div class="mb-3 form-check">
                    <label for="content" class="form-label">Comment</label>
                    <textarea  class="form-control" rows="3" name="comment" required></textarea>
                </div>
                <p style="font-family: 'M PLUS Rounded 1c', sans-serif;">スタンプ</p>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="feeling" id="heart" value="1" style="opacity: 0;">
                        <label class="form-check-label" for="heart"><i class="far fa-grin-hearts fa-2x"></i></label>
                        <input class="form-check-input" type="radio" name="feeling" id="fa-meh" value="2" style="opacity: 0;">
                        <label class="form-check-label" for="fa-meh"><i class="far fa-meh fa-2x"></i></label>
                        <input class="form-check-input" type="radio" name="feeling" id="dizzy" value="3" style="opacity: 0;">
                        <label class="form-check-label" for="dizzy"><i class="far fa-dizzy fa-2x"></i></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark d-block m-auto">追加</button>
            </form>
        </div>
    </div>
</div>
@endsection
