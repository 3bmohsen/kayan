@extends('kayan.managing.admins.master')
@section('title','عرض الوظائف')
@section('body')
<style>
    .table{
        --bs-table-hover-bg: rgb(220 220 220 / 36%);
        --bs-table-color: #ffffff;
    --bs-table-bg: #ffffff00;
    }
</style>
<div class="container" >
    <h1 class="text-center m-3 text-light">عرض الوظائف</h1>
    <div class="d-flex justify-content-center align-items-center mt-3">
        <a href="/ShowEmployees"><button type="button" class="btn btn-success mb-3" >إضافة وظيفة</button></a>
    </div>
    @if(session('success'))
            <div class="alert alert-success text-center cairo-bold m-5">
                {{ session('success') }}
            </div>
        @endif  
    <livewire:emp-jobs />

</div>
@endsection