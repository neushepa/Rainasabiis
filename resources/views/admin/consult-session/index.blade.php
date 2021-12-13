@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-button">
                <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">{{ $title }}</a></div>
                <div class="breadcrumb-item">All {{ $title }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ $title }}</h2>
            <p class="section-lead">
                You can manage all {{ $title }}, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All {{ $title }}</h4>
                        </div>
                        <div class="card-body">


                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>Topik</th>
                                            <th>Siswa</th>
                                            <th>Mentor</th>
                                            <th>Dimulai</th>
                                            {{-- <th>Berakhir</th> --}}
                                            <th>Status</th>
                                            <th>Tautan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consult as $c)
                                        <tr>
                                            <td>{{ $c->topic }}
                                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'mentor')
                                                <div class="table-links">
                                                    <a href="{{ route('consult-session.edit',$c->id) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    @if (Auth::user()->role == 'admin')
                                                    <a href="#" onclick="event.preventDefault(); $('#destroy-{{ $c->id }}').submit()">Delete</a>
                                                    <form id="destroy-{{ $c->id }}" action="{{ route('consult-session.destroy',$c->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    @endif
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $c->User->name }}</td>
                                            <td>{{ $c->mentor }}</td>
                                            <td>{{ $c->start_at }}</td>
                                            {{-- <td>{{ $c->end_at }}</td> --}}
                                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'mentor')
                                            <td><a href="{{ route('consult.status', ['id' => $c->id]) }}">{!! $c->status_text !!}</a></td>
                                            @else
                                            <td>{!! $c->status_text !!}</td>
                                            @endif
                                            @if($c->status =='0')
                                            <td><a href="{{ $c->link }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Belum Tersedia</a></td>
                                            @else
                                            <td><a href="{{ $c->link }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Tersedia</a></td>
                                            @endif

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
