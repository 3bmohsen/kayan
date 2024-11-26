@extends('kayan.managing.clients.CprofileMaster')
@section('title','الإقرارات الضريبية')
@section('Pbody')
@section('id', request()->route('id'))

<div class="container d-flex flex-column align-items-center justify-content-center">
<h2 class="text-center" style=" font-weight: bold; ">الإقرارات الضريبية</h2>
<hr style="    border: 3px solid black;width: 200px;">
<a href="/addTaxDoc/{{request()->route('id')}}"><div class="btn btn-success">إضافة إقرار جديد</div></a>
</div>
@if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif 
<div class="container mt-3">
    <div class="d-flex flex-column" style="background: #2980b9b5;border-radius: 10px;">
    @livewire('tax-docslist', ['id' =>request()->route('id')])
    </div>
</div>

@endsection