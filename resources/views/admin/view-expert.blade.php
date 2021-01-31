@extends('layouts.admin')

@section('title', 'Questions')

@section('style')
<link href="{{ asset('base/libs/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset('base/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
<style>
    .profile {
        margin-top: 20px;
    }
    .profile-image {
        width: 170px;
        height: 170px;
        object-fit: contain;
        border-radius: 20px;
    }
</style>
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Expert's Data</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.articles') }}">All Experts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $user->fname }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $user->fname }} {{ $user->lname }}</h4>
            <br>
            <hr>
            @if ($user->photo)
            <img src="{{ $user->photo }}" class="profile-image" alt="{{ $user->fname }}" />
            @else
            <img src="{{ asset('img/user-photo.png') }}" class="profile-image" alt="{{ $user->fname }}" />
            @endif
            <br>
            <div class="profile">
                <p><strong>Name :</strong> <span>{{ $user->fname }} {{ $user->lname }}</span></p>
                <p><strong>Email :</strong> <span>{{ $user->email }}</span></p>
                <p><strong>Specialty :</strong> <span>{{ $user->expert->specialty }}</span></p>
                <p><strong>Experience :</strong> <span>{{ $user->expert->experience }}</span></p>
                <p><strong>A Consultant :</strong> <span>{{ $user->expert->consultant ? "Yes": "No" }}</span></p>
                <p><strong>Expert Bio :</strong> <span>{{ $user->expert->bio }}</span></p>
            </div>
            
            <hr>
            <br>
            @if ($user->expert_status === "pending")
            <a href="{{ route('admin.expert.approve', ['id' => $user->id]) }}" class="btn btn-success m-t-20"><i class="far fa-envelope"></i> Approve Expert</a>
            @endif
            <a href="{{ route('admin.expert.delete', ['id' => $user->id]) }}" class="btn btn-dark m-t-20">Delete Expert</a>
          </div>
      </div>
      </div>
    </div>
  </div>

@endsection