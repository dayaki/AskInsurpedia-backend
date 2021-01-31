@extends('layouts.admin')

@section('title', 'Questions')

@section('style')
<link href="{{ asset('base/libs/summernote/dist/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset('base/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
<style>
    .dropzone {
    border: 1px solid rgba(0,0,0,0.1);
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
            <h4 class="page-title">Article Detail</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.articles') }}">All Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
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
            <h4 class="card-title">{{ $article->title }}</h4>
            <br>
            <hr>
            <img src="{{ $article->image }}" alt="{{ $article->image }}" style="width: 170px;height: 170px;object-fit: contain;" />
            <br>
            <div>{{ $article->content }}</div>
            
            <hr>
            <br>
            <a href="{{ route('admin.article.edit', ['id' => $article->id]) }}" class="btn btn-success m-t-20"><i class="far fa-envelope"></i> Edit Article</a>
            <a href="{{ route('admin.article.delete', ['id' => $article->id]) }}" class="btn btn-dark m-t-20">Delete Article</a>
          </div>
      </div>
      </div>
    </div>
  </div>

@endsection