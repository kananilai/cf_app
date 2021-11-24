@extends('layouts.app')

@section('content')
<div class="border border-dark p-3 rounded  w-50 mx-auto shadow-lg" style="background-color: rgba(128, 128, 128, 0.527)">
<form method='POST' action="/adminStore">
    @csrf
    <input type='hidden' name='user_id' value="{{ $user['id'] }}">
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3 form-check">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" rows="5" name="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-dark d-block m-auto">追加</button>
</form>
</div>
@endsection
