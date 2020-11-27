@extends('layouts.front')

@section('heading')

@endsection
<div class="space"></div>
@section('content')

@include('thread.partials.thread-list')
<div class="space"></div>
@include('layouts.partials.footer')

@endsection