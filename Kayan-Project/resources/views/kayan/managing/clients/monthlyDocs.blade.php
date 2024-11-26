@extends('kayan.managing.clients.CprofileMaster')
@section('title','الإقرارات الشهرية')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">الإقرارات الشهرية</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/AddMonDoc/{{request()->route('id')}}"><div class="btn btn-success">إضافة إقرار شهري</div></a>
</div>
@if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif 
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('monthly-docs-list', ['id' =>request()->route('id')])

        
    </div>
</div>

@endsection