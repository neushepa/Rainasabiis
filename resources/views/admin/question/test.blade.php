@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 554px;">
    <section class="section">
      <div class="section-header">
        <h1>Test Potensi Akademik</h1>
      </div>
      @foreach($soal as $q)
      <form action="{{ $route }}" method="POST">
        @csrf
         @method($method)
      <div class="section-body">
            <input type="hidden" name="id_soal" value="{{ $q->id }}">
            <div class="form-group">
                <label class="d-block">{{ $q->question }}</label>
                <div class="form-check">
                    <label class="form-check-label" for="exampleRadios1">A. </label>
                    <label class="form-check-label" for="exampleRadios1">{{ $q->answera }}</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="exampleRadios1">B. </label>
                    <label class="form-check-label" for="exampleRadios1">{{ $q->answerb }}</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="exampleRadios1">C. </label>
                    <label class="form-check-label" for="exampleRadios1">{{ $q->answerc }}</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="exampleRadios1">D. </label>
                    <label class="form-check-label" for="exampleRadios1">{{ $q->answerd }}</label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="exampleRadios1">E. </label>
                    <label class="form-check-label" for="exampleRadios1">{{ $q->answere }}</label>
                </div>
                <select name="jawaban" class="form-control">
                    <option disabled>Pilih Jawaban</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                    <option>E</option>
                </select>
                <input type="hidden" name="correct" id="ujianHasilId" value="{{ $q->correct }}">

            </div>
            @endforeach
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-4 col-md-4 col-lg-4"></label>
            <div class="col-sm-12 col-md-7">
              <button class="btn btn-primary">Submit Test</button>
            </div>
          </div>

    </section>
  </div>
  @endsection

