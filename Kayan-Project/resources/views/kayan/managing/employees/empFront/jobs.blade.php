@extends('kayan.managing.employees.empFront.master')
@section('title','الوظائف')
@section('body')
<div class="container" >
    <h1 class="text-center m-3">الوظائف</h1>
    @if(session('success'))
    <div class="alert alert-success text-center cairo-bold m-5">
    {!! session('success') !!}
    </div>
@endif 

@if(session('fail'))
    <div class="alert alert-danger text-center cairo-bold m-5">
        {{ session('fail') }}
    </div>
@endif   
        @livewire('emp-jobs-list', ['id' =>request()->route('id')])

</div>

@endsection