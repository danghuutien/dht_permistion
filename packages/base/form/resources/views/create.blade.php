@extends('Base::layouts.app')
@section('content')
    <div id="app">
        @include('Form::generate')
        <button @click="submitForm()">save</button>
    </div>
@endsection
@section('foot')
    @include('Form::script')
@endsection