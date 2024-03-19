@extends('layout.app')

{{--Customize Layout section--}}

@section('subtitle','welcome')
@section('content_header_title','Home')
@section('content_header_subtitle','Welcome')

{{--Content body: main page content--}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
    @stop

{{--Push extra CSS--}}

@push('css')
    {{--Add gere extra stylesheet--}}
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@endpush

{{--Push extra Javascript--}}

@push('js')
<script>
    console.log('Hi Im using the Laravel-adminLTE plugin');
</script>
@endpush