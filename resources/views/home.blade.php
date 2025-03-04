@extends('layouts.auth')
@push('title', 'Home')
@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center px-6 py-8 mx-auto col-md-6"
        style="min-height: 90vh">
        <div class="w-100 bg-white rounded-3 p-4 p-sm-5">
            <h1 class="space-y-4 text-center">
                Welcome To {{ config('app.name') }}
            </h1>
        </div>
    </div>
@endsection
