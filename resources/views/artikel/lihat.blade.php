@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    
    <div class="card-body">
        <h3>Judul : {{$items->judul}}</h3>
       slug : {{$items->slug}}
       <br>
       {{$items->isi}}
       <br>
       <br>
        @foreach(explode(',',$items->tag) as $det)
            <button class="btn btn-success">{{$det}}</button>
        @endforeach
    </div>
</div>
@endsection
