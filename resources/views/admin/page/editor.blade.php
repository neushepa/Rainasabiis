@extends('layouts.admin.app')

@section ('content')
<div class="main-content" style="min-height: 524px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/post" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Article</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Page</a></div>
                <div class="breadcrumb-item">Create New Page</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Create New Page</h2>
            <p class="section-lead">
                On this page you can create a new Page and fill in all fields.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Page</h4>
                        </div>
                        <form action="{{ $route }}" method="POST">
                            @csrf
                            @method($method)
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Page Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="p_title" class="form-control" value="{{ old('p_title',$pages->p_title??'') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="p_slug" class="form-control" value="{{ old('slug',$pages->p_slug??'') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Excerpt</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="p_excerpt" class="form-control" value="{{ old('slug',$pages->p_slug??'') }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" name="p_body">{{ old('body', $pages->p_body??'') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Save Page</button>
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

@section('script')
    <script>
        $('#banner').on('change', function(){
            const [file] = $(this)[0].files;
            if(file){
                $('#preview-img').attr('src', URL.createObjectURL(file))
            }
        })
    </script>

@endsection
