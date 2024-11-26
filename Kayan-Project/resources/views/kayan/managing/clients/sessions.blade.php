@extends('kayan.managing.clients.CprofileMaster')
@section('title','جلسات اللجان')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">جلسات اللجان</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/Addsession/{{request()->route('id')}}"><div class="btn btn-success">إضافة جلسة جديدة</div></a>
</div>
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('sessions', ['id' =>request()->route('id')])

        
    </div>
</div>

@endsection