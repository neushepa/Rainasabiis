@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Question</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Question</a></div>
              <div class="breadcrumb-item">All Question</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Question</h2>
            <p class="section-lead">
              You can manage all Question, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Question</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Opsi A</th>
                                <th>Opsi B</th>
                                <th>Opsi C</th>
                                <th>Opsi D</th>
                                <th>Opsi E</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($question as $quest)
                            <tr>
                                <td>{{ $quest->question }}<div class="table-links">
                              <a href="{{ route('question.edit',$quest->id) }}">Edit</a>
                              <div class="bullet"></div>
                              <a href="#" onclick="event.preventDefault(); $('#destroy-{{ $quest->id }}').submit()">Delete</a>
                              <form id="destroy-{{ $quest->id }}" action="{{ route('question.destroy',$quest->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                </form>
                            </div></td>
                                <td>{{ $quest->answera }}</td>
                                <td>{{ $quest->answerb }}</td>
                                <td>{{ $quest->answerc }}</td>
                                <td>{{ $quest->answerd }}</td>
                                <td>{{ $quest->answere }}</td>
                                <td>{{ $quest->correct }}</td>
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
