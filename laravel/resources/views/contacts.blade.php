@extends('layouts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <livewire:contact-component :post="$post"/>
        </div>
    </div>
@endsection
