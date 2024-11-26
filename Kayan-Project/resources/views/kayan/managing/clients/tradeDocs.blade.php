@extends('kayan.managing.clients.CprofileMaster')
@section('title','الهيئة العامه للأستثمار')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">الهيئة العامه للأستثمار</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/AddTradeDoc/{{request()->route('id')}}"><div class="btn btn-success">إضافة</div></a>
</div>
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('trade-docs', ['id' =>request()->route('id')])

        
    </div>
</div>

@endsection