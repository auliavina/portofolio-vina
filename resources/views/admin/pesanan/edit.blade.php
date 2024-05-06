@extends('layouts.admin.app')
@section('title', 'About')
@section('content')

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit About</h2>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Something went wrong.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card mb-4">
                <div class="col-lg-12 mt-4">
                    <form action="{{ route('about.update', $abouts) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama</strong>
                                    <input type="text" name="nama" value="{{ $abouts->nama }}" class="form-control"
                                        placeholder="Input nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Birthday</strong>
                                    <input type="date" name="ulang_tahun" value="{{ $abouts->ulang_tahun }}"
                                        class="form-control" placeholder="Input tanggal lahir">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Website</strong>
                                    <input type="text" name="website" value="{{ $abouts->website }}" class="form-control"
                                        placeholder="Input nama website">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>No HP</strong>
                                    <input type="text" name="no_hp" value="{{ $abouts->no_hp }}" class="form-control"
                                        placeholder="Input no hp">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Umur</strong>
                                    <input type="text" name="umur" value="{{ $abouts->umur }}" class="form-control"
                                        placeholder="Input umur">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="email" name="email" value="{{ $abouts->email }}" class="form-control"
                                        placeholder="Input Email">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Profil</strong>
                                    <input type="text" name="profil" value="{{ $abouts->profil }}" class="form-control"
                                        placeholder="Input profil">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Foto</strong>
                                    <input type="file" class="form-control form-control-md" name="foto"
                                        placeholder="Foto" accept="foto/png, foto/jpeg, foto/jpg" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-right mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
