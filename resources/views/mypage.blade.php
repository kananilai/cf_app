@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12 text-center mb-5 mt-3">
        <h2><span>{{ $user['name'] }} さん</span></h2>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center" style="font-size:30px; font-weight:bold; height:10%;">Score</div>
            <div class="card col-lg-5 mx-auto my-2 border border-secondary col-md-5 col-sm-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size:2em;">Spuat</h5>
                    @foreach($squats as $squat)
                    <div class="d-flex justify-content-between">
                        <p class="card-text">{{ $squat['date']->format('m.d') }}</p>
                        <p class="card-text">{{ $squat['set'] }}sets　　{{ $squat['weight'] }}kg  ×  {{ $squat['rep'] }}reps</p>
                        <div class="justify-content-end">
                            <form action="/delete/{{ $squat['weight_id'] }}/{{ $squat['id'] }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card col-lg-5 mx-auto my-2 border border-success col-md-5 col-sm-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size:2em;">Deadlift</h5>
                    @foreach($deadlifts as $deadlift)
                    <div class="d-flex justify-content-between">
                        <p class="card-text">{{ $deadlift['date']->format('m.d') }}</p>
                        <p class="card-text">{{ $deadlift['set'] }}sets　　{{ $deadlift['weight'] }}kg  ×  {{ $deadlift['rep'] }}reps</p>
                        <div class="justify-content-end">
                            <form action="/delete/{{ $deadlift['weight_id'] }}/{{ $deadlift['id'] }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card col-lg-5 mx-auto my-2 border border-warning col-md-5 col-sm-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size:2em;">Snatch</h5>
                    @foreach($snatches as $snatch)
                    <div class="d-flex justify-content-between">
                        <p class="card-text">{{ $snatch['date']->format('m.d') }}</p>
                        <p class="card-text">{{ $snatch['set'] }}sets　　{{ $snatch['weight'] }}kg  ×  {{ $snatch['rep'] }}reps</p>
                        <div class="justify-content-end">
                            <form action="/delete/{{ $snatch['weight_id'] }}/{{ $snatch['id'] }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card col-lg-5 mx-auto my-2 border border-primary col-md-5 col-sm-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size:2em;">Clean</h5>
                    @foreach($cleans as $clean)
                    <div class="d-flex justify-content-between">
                        <p class="card-text">{{ $clean['date']->format('m.d') }}</p>
                        <p class="card-text">{{ $clean['set'] }}sets　　{{ $clean['weight'] }}kg  ×  {{ $clean['rep'] }}reps</p>
                        <div class="justify-content-end">
                            <form action="/delete/{{ $clean['weight_id'] }}/{{ $clean['id'] }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card col-lg-6 mx-auto p-4 my-4 shadow text-center" style="background-color:rgb(172, 142, 124); border:1px solid #000">
            <img src="{{ asset('/img/form.png ')}}" class="mx-auto" style="width:30%;">
            <form method="post" action="/storeWeight/{{ $user['id'] }}">
                @csrf
                <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="weight" required>
                        <option value="1">Squat</option>
                        <option value="2">Deadlift</option>
                        <option value="3">Snatch</option>
                        <option value="4">Clean</option>
                    </select>
                </div>
                <div class="m-3 d-flex">
                    <input type="text" class="form-control mx-2" id="set" name="set" required>
                    <span style="font-size: 1.4em;">sets</span>
                    <input type="text" class="form-control mx-2" id="kg" name="kg" required>
                    <span style="font-size: 1.4em;">kg</span>
                    <input type="text" class="form-control mx-2" id="rep" name="rep" required>
                    <span style="font-size: 1.4em;">reps</span>
                </div>
                <button type="submit" class="btn btn-dark d-block m-auto">追加</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center" style="font-size:30px; font-weight:bold;">Record</div>
        @foreach($records as $record)
            <div class="card col-lg-5 text-center mx-auto my-2 col-md-5 col-sm-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text " style="font-family: 'M PLUS Rounded 1c', sans-serif;">{{ $record['created_at']->format('m.d')  }}</p>
                        <p class="card-text pl-3" style="font-family: 'M PLUS Rounded 1c', sans-serif;">
                            @if($record['feeling'] == 1)
                                <i class="far fa-grin-hearts fa-2x" style="color:#ff1493;"></i>
                            @elseif($record['feeling'] == 2)
                                <i class="far fa-meh fa-2x" style="color:#ffd700;"></i>
                            @elseif($record['feeling'] == 3)
                                <i class="far fa-dizzy fa-2x" style="color:#0000ff;"></i>
                            @endif
                        </p>
                    </div>
                    <p class="card-text text-left" style="font-family: 'M PLUS Rounded 1c', sans-serif;"><span style="font-size:1.2em;">Score： </span>{{ $record['score'] }}</p>
                    <p class="card-text text-left" style="font-family: 'M PLUS Rounded 1c', sans-serif;"> Comment<br>{{ $record['comment'] }}</p>
                    <a class="badge badge-secondary p-2" style="font-family: 'M PLUS Rounded 1c', sans-serif;" href="/showWod/{{ $record['wod_id'] }}">WOD</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
