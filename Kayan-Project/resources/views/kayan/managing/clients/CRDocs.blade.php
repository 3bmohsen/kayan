@extends('kayan.managing.clients.CprofileMaster')
@section('title','السجل التجاري')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">السجل التجاري</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/AddCRDoc/{{request()->route('id')}}"><div class="btn btn-success">إضافة</div></a>
</div>
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('add-c-r-doc', ['id' =>request()->route('id')])

    </div>
</div>

@endsection