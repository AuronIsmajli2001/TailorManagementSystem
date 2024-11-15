@extends('layouts.app')

@push('page-css')
	
@endpush

@push('breadcrumb')
<h3 class="content-header-title">Faqe Zbrazet</h3>
<div class="row breadcrumbs-top">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Zbrzet</a>
            </li>
            <li class="breadcrumb-item active">Faqe e Zbrazet
            </li>
        </ol>
    </div>
</div>
@endpush


@section('content')

@endsection

@push('page-js')
	
@endpush


