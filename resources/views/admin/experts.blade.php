@extends('layouts.admin')

@section('title', 'Questions')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Approved Experts </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Experts</li>
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
            <h4 class="card-title">All Approved Experts</h4>
              <h6 class="card-subtitle">A listing of all approved experts on the platform.</h6>
              <br>
            @if (count($users))
              <table id="projects" class="table m-t-30 no-wrap table-hover contact-list" data-page-size="7" data-paging="true">
                  <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->fname }}</td>
                        <td>{{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y, g:i a') }}</td>
                          <td>
                            <a href="{{ route('admin.expert.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="Delete Expert" style="margin-right: 10px;background-color: #efefef;">
                                <i class="ti-close"></i>
                            <a href="{{ route('admin.expert.view', ['id' => $user->id]) }}" class="btn btn-sm btn-icon" data-toggle="tooltip" data-original-title="View Profile" style="background-color: #efefef;">
                              <i class="ti-arrow-right"></i>
                            </a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <td colspan="6">
                              <div class="text-right">
                                  <ul class="pagination">
                                  </ul>
                              </div>
                          </td>
                      </tr>
                  </tfoot>
              </table>
            @else
              <p>No approved experts yet.</p>
            @endif
          </div>
      </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>
<script>
  const deleteQuestion = (id) => {
        Swal.fire({
          title: "You won't be able to revert this!",
          text: "This will delete this question and all comments.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            window.location.href = `question/delete/${id}`;
          }
        })
      }
</script>
@endsection