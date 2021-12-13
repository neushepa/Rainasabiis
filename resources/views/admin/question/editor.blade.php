@extends('layouts.admin.app')
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
            <h1>Create New Question</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Question</a></div>
              <div class="breadcrumb-item">Create New Question</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Create New Question</h2>
            <p class="section-lead">
              On this page you can create a new Question and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Question</h4>
                  </div>
                  <form action="{{ $route }}" method="POST">
                      @csrf
                      @method($method)
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Question Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="question" class="form-control" value="{{ str_contains($url, 'edit') ? $question->question : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option A</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="opt_a" class="form-control" value="{{ str_contains($url, 'edit') ? $question->answera : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option B</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="opt_b" class="form-control" value="{{ str_contains($url, 'edit') ? $question->answerb : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option C</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="opt_c" class="form-control" value="{{ str_contains($url, 'edit') ? $question->answerc : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option D</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="opt_d" class="form-control" value="{{ str_contains($url, 'edit') ? $question->answerd : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Option E</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="opt_e" class="form-control" value="{{ str_contains($url, 'edit') ? $question->answere : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Answer</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="correct" class="form-control" value="{{ str_contains($url, 'edit') ? $question->correct : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Question</button>
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
