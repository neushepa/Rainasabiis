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
                                            <th>Mentor</th>
                                            <th>Dimulai</th>
                                            <th>Berakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consult as $c)
                                        <tr>
                                            <td>{{ $c->topic }}
                                                <div class="table-links">
                                                    <a href="#" data-id="{{ $c->id }}" class="modal_button">Accept</a>
                                                    <div class="bullet"></div>
                                                    <a href="#" class="delete-data">Delete</a>
                                                    <form id="destroy-{{ $c->id }}" action="{{ route('consult-session.destroy',$c->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                            <td>{{ $c->mentor }}</td>
                                            <td>{{ $c->start_at }}</td>
                                            <td>{{ $c->end_at }}</td>

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
    $('.modal_button').on('click', async function(){
        const { value: url } = await Swal.fire({
            input: 'url',
            inputLabel: 'URL address',
            inputPlaceholder: 'Enter the URL'
        })
        if(url){
            $.ajax({
                url: '/admin/consult-session/save-link/'+$(this).data('id'),
                method: 'post',
                data: {
                    _token: $('input[name=_token]').val(),
                    _method: 'put',
                    url: url
                },
                success: (title)=>{
                    Toast.fire({
                        icon:'success',
                        title
                    })
                }
            })
        }
    })
</script>
@endsection
