@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Testimoni</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Testimoni</a></div>
              <div class="breadcrumb-item">All Testimoni</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Testimoni</h2>
            <p class="section-lead">
              You can manage all Testimoni, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Testimoni</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Testimoni</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($testimoni as $ts)
                    @if ($ts->user_id == Auth::user()->id && Auth::user()->role == 'student')
                            <tr>
                                <td>{{ $ts->title }}<div class="table-links">
                              <a href="{{ route('testimoni.edit',$ts->id) }}">Edit</a>
                              <div class="bullet"></div>
                              <a href="#" onclick="event.preventDefault(); $('#destroy-{{ $ts->id }}').submit()">Delete</a>
                              <form id="destroy-{{ $ts->id }}" action="{{ route('testimoni.destroy',$ts->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                </form>
                            </div></td>
                                <td>{{ strip_tags(str_replace('&nbsp;', ' ', $ts->testimoni)) }}</td>
                                <td>{{ $ts->created_at }}</td>
                                <td>{{ $ts->user->name }}</td>
                                <td>{!! ($ts->status == 0) ? '<span style="color: red;">Not Approved</span>' : '<span style="color: green;">Approved</span>' !!}</td>
                            </tr>
                            @else
                            <tr>
                                <td>{{ $ts->title }}<div class="table-links">
                              <a href="{{ route('testimoni.edit',$ts->id) }}">Edit</a>
                              <div class="bullet"></div>
                              <a href="#" onclick="event.preventDefault(); $('#destroy-{{ $ts->id }}').submit()">Delete</a>
                              <form id="destroy-{{ $ts->id }}" action="{{ route('testimoni.destroy',$ts->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                </form>
                            </div></td>
                                <td>{{ strip_tags(str_replace('&nbsp;', ' ', $ts->testimoni)) }}</td>
                                <td>{{ $ts->created_at }}</td>
                                <td>{{ $ts->user->name }}</td>
                                <td>{!! ($ts->status == 0) ? '<span style="color: red;">Not Approved</span>' : '<span style="color: green;">Approved</span>' !!}</td>
                            </tr>
                            @endif
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
