@extends('kayan.managing.admins.master')
@section('title','لوحة تحكم المدير')
@section('body')
<style>
    .btn-light{
        --bs-btn-bg: #f8f9fa00;
        --bs-btn-color: #fff;
        --bs-btn-hover-bg: #fff;
        width: 75px;
        
    }
    .m-hover-3 {
            transition: transform 0.3s, box-shadow 0.3s; /* تأثير الانتقال */
        }

        .m-hover-3:hover {
            transform: scale(1.025); /* تكبير العنصر عند التمرير */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* إضافة ظل */
        }

</style>
<div class="container ">
<h1 class="text-center m-5 text-light">الإحصائيات</h1>
@livewire('statistics')

</div>
@endsection