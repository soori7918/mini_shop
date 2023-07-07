@extends('layouts.frontend')
@section('styles')
    <link href="{{asset('css/svg-turkiye-haritasi.css?v=').time()}}" rel="stylesheet"/>
@endsection
@section('content')
    @include('map.map')
    <div class="container bg-white m-auto">
        <div class="row">
        </div>
    </div>
@endsection
@section('scripts')

@endsection
