@extends('layouts.admin')

@section('title', 'Questions')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">All Questions </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.questions') }}">All Questions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Question Details</li>
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
            {{-- <h4 class="card-title">Question Details</h4> --}}
            <div class="heading-elements">
                <span class="badge badge-default badge-info">{{ $question->category }}</span>
                <span class="badge badge-default badge-warning">{{ \Carbon\Carbon::parse($question->created_at)->format('F j, Y, g:i a') }}</span>
            </div>
            
          </div>

          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <h4 class="card-title">{{ $question->question }}</h4>
                <div class="user" style="margin-top:50px;">
                    <img src="{{ asset('img/user-photo.png') }}" alt="image" style="width:50px;height:50px;border-radius:10rem;vertical-align:top;">
                    <p style="display: inline-block;margin-top:0px;margin-left:7px;">{{ $question->user->fname }} {{ $question->user->lname }}
                        <span style="display:block;opacity:.6;margin-top:1px">{{ $question->user->email }}</span>
                    </p>
                </div>
                <br>
                <hr>
                <style>
                    .comment {
                        border-bottom: 1px dotted rgba(0,0,0,0.4);
                        margin-bottom: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                    .comment p.text {
                        margin: 0;
                    }
                    .comment p.text span {
                        opacity: 0.7;
                    }
                </style>
                <h4 class="card-title">Answers</h4>
                @foreach ($question->comments as $comment)
                    <div class="comment">
                        <p class="text">{{$comment->comment}} - <span>{{ $comment->user->fname }} {{ $comment->user->lname }}</span></p>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
      </div>
    </div>
  </div>

@endsection