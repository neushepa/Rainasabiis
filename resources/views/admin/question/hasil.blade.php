@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Hasil Ujian TPA</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">TPA</a></div>
              <div class="breadcrumb-item">Hasil Test</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hasil Test</h2>
            <p class="section-lead">
              You can manage all Test, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Hasil Test</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Test</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($hasil as $hs)
                            <tr>
                                <td>{{ $hs->user->name }}</td>
                                <td>{{ $hs->created_at }}</td>
                                <td>{{ $hs->nilai }}</td>
                                <td>{!! $hs->status_text !!}</td>
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
