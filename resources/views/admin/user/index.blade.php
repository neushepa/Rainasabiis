@extends('layouts.admin.app')
@section ('content')
@php
$url = Route::current()->getName();
@endphp

<div class="main-content" style="min-height: 554px;">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi,{{ $pro->name }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ (is_null($pro->photo)) ? '/assets/admin/img/avatar/avatar-1.png' : asset($pro->photo) }}" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $pro->role }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>{{ $pro->name }}
                                </div>{!! $pro->bio !!}
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow {{ $pro->name }} On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="{{ $route }}" method="POST" multi-part enctype="multipart/form-data">
                            @csrf
                            @method($method)
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->id_number : '' }}" name="id_number">
                                        <div class="invalid-feedback">
                                            Please fill in the ID Number
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->name : '' }}" required="" name="name">
                                        <div class="invalid-feedback">
                                            Please fill in the name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->email : '' }}" required="" name="email">
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>No Telp</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control phone-number" name="phone" value="{{ str_contains($url, 'edit') ? $pro->phone : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="{{ str_contains($url, 'edit') ? $pro->gender : $pro->gender }}">{{ $pro->gender }}</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>




                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Agama</label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option value="{{ str_contains($url, 'edit') ? $pro->religion : $pro->religion }}">{{ $pro->religion }}</option>
                                            <option>Islam</option>
                                            <option>Protestan</option>
                                            <option>Katolik</option>
                                            <option>Budha</option>
                                            <option>Hindu</option>
                                            <option>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Tanggal Lahir</label>
                                        <input placeholder="Select date" type="date" id="dob" class="form-control" name="dob" value="{{ str_contains($url, 'edit') ? $pro->dob : '' }}">
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Golongan Darah</label>
                                        <select name="blod_type" class="form-control">
                                            <option value="{{ str_contains($url, 'edit') ? $pro->blod_type : $pro->blod_type }}">{{ $pro->blod_type }}</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>AB</option>
                                            <option>O</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Alamat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-location-arrow"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="address" value="{{ str_contains($url, 'edit') ? $pro->address : '' }}">
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the Address
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Instagram</label>
                                        <input type="text" name="instagram" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->instagram : '' }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Instagram Address
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->facebook : '' }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Facebook Address
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Twitter</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ str_contains($url, 'edit') ? $pro->twitter : '' }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Twitter Address
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio</label>
                                        <textarea name="bio" class="form-control summernote" style="display: none;">{{ str_contains($url, 'edit') ? $pro->bio : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
