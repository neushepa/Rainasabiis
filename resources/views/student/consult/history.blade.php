@extends('layouts.admin.app')

@section('content')
<div class="main-content" style="min-height: 555px;">
    <section class="section">
        <div class="section-header">
            <h1>Riwayat Konsultasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Riwayat Konsultasi</a></div>
                <div class="breadcrumb-item">All Riwayat Konsultasi</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Riwayat Konsultasi</h2>
            <p class="section-lead">
                You can manage all Riwayat Konsultasi, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Riwayat Konsultasi</h4>
                        </div>
                        <div class="card-body">


                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>Topik</th>
                                            <th>Mentor</th>
                                            <th>Dimulai</th>
                                            <th>Berakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consults as $c)
                                        <tr>
                                            <td>{{ $c->topic }} </td>
                                            <td>{{ $c->mentor }}</td>
                                            <td>{{ $c->start_at }} WIB</td>
                                            <td>{{ $c->end_at }} WIB</td>
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
    $(document).ready(function() {
        $('#table_id').DataTable();
    });

</script>
@endsection
