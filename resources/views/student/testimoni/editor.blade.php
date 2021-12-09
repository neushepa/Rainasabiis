@extends('layouts.student.app')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 524px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Testimoni</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Testimoni</a></div>
                <div class="breadcrumb-item">Create New Testimoni</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Create New Testimoni</h2>
            <p class="section-lead">
                On this page you can create a new Testimoni and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Testimoni</h4>
                        </div>
                        <form action="{{ $route }}" method="POST">
                            @csrf
                            @method($method)
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" class="form-control"
                                            value="{{ str_contains($url, 'edit') ? $testi->title : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Testimoni</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control summernote" style="display: none;"
                                            name="testimoni">{{ str_contains($url, 'edit') ? $testi->testimoni : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Create Testimoni</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
</div>
</section>
</div>
@endsection
