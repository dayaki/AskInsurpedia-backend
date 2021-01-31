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
            <h4 class="page-title">Edit Article </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.articles') }}">All Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
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
            <h4 class="card-title">Edit Article</h4>
            <br>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                @foreach ($errors->all() as $error)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> {{ $error }} 
                @endforeach
            </div>
            @endif
            <form action="{{ route('admin.article.edit.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" required placeholder="Title of Article" value="{{ $article->title }}">
                    <input type="hidden" name="articleID" value="{{ $article->id }}">
                </div>
                <textarea id="summernote" name="content"></textarea>
                <h4>Attachment</h4>
                <div class="dropzone" id="image">
                    <div class="fallback">
                        <input name="image" required type="file" />
                    </div>
                </div>
                <button type="submit" class="btn btn-success m-t-20"><i class="far fa-send"></i> Publish Article</button>
            </form>
          </div>
      </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('base/libs/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('base/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script>
    const content = {!! json_encode($article->content) !!};
    $('#summernote').summernote({
        placeholder: 'Article content',
        tabsize: 2,
        height: 250,
        code: content
    });
    // $('#summernote').summernote('code', );
    $("#image").dropzone({
        acceptedFiles: ".jpeg,.jpg,.png",
        maxFilesize: 1,
    });
</script>
@endsection