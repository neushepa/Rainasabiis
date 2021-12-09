@extends('layouts.admin.app')

@section('content')
<div class="main-content" style="min-height: 524px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Schedule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Schedules</a></div>
                <div class="breadcrumb-item">Create New Schedule</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Create New Schedule</h2>


            <div class="row">
                <div class="col-12">
                    <form action="" method="POST">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Buat Jadwal Konsul Baru</h4>
                                @if (!is_null($link))
                                <span>
                                    <b class="mr-2">Linknya</b>
                                    {!! $link !!}
                                </span>
                                @endif
                            </div>
                            <div class="card-body">
                            @if ($consult->exists())
                                <div class="alert alert-success">Anda sudah membuat jadwal konsultasi hari ini.</div>
                            @else
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Topik</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="topic" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mentor</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="mentor_id" id="mentor" class="form-control" required autofocus>
                                            <option></option>
                                            @foreach($mentors as $mentor)
                                                <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sesi Ke</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="sesi_ke" id="sesi_ke" class="form-control" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
    <script>
        $('#mentor').on('change', function(){
            $('#sesi_ke').empty()
            if($(this).val()!=''){
                $.ajax({
                    url: '/student/mentor/'+$(this).val(),
                    success: function(result){
                        $('#sesi_ke').append('<option></option>')
                        result.forEach((v, k)=>{
                            $('#sesi_ke').append(`<option value="${v.value}">${v.text}</option>`)
                        })
                    }
                })
            }
        })
    </script>
@endsection
