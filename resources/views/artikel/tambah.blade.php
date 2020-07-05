@extends('layouts.master')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Artikel</h6>
    </div>
    <div class="card-body">
        @include('artikel.form')
    </div>
</div>
@endsection
