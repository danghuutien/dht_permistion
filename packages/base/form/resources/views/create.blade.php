@extends('Base::layouts.app')
@section('content')
    <div id="app">
        @include('Form::generate')
    </div>
    <button @click="submitForm()">save</button>
@endsection
@section('foot')
    @include('Form::script')
@endsection