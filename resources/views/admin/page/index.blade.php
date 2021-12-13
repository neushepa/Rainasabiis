@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Pages</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Pages</a></div>
              <div class="breadcrumb-item">All Page</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Pages</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Pages</h4>
                  </div>

                  <div class="card-body">
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Created By</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($page as $page)
                            <tr>
                                <td>{{ $page->p_title }}<div class="table-links">
                              <a href="{{ route('page.edit',$page->id) }}">Edit</a>
                              <div class="bullet"></div>
                              <a href="#" onclick="event.preventDefault(); $('#destroy-{{ $page->id }}').submit()">Delete</a>
                              <form id="destroy-{{ $page->id }}" action="{{ route('page.destroy',$page->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                </form>
                            </div></td>
                                <td>{{ $page->p_slug }}</td>
                                <td>{{ $page->created_at }}</td>
                                <td>{{ $page->user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endsection
