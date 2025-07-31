@php
    $noSidebar = true;
@endphp

@extends('layouts.app')

@section('no-navbar')
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4"></h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-key me-1"></i>
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-trash me-1"></i>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
