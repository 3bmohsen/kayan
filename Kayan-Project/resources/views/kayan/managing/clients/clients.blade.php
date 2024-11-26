@extends('kayan.managing.clients.master')
@section('title','عرض العملاء')
@section('body')
<div class="container" >
    <h1 class="text-center m-5">عرض العملاء</h1>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
    <livewire:clients-list />

</div>

@endsection