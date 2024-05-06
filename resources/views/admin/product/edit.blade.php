@extends('layouts.admin.app')
@section('title', 'Edit Product')
@section('content')

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Product</h2>
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
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Produk</strong>
                                    <input type="text" name="nama_product" value="{{ $product->nama_product }}"
                                        class="form-control" placeholder="Input produk">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Harga Satuan</strong>
                                    <input type="number" name="harga_satuan" value="{{ $product->harga_satuan }}"
                                        class="form-control" placeholder="Input hraga satuan">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Deskripsi</strong>
                                    <textarea id="text" name="deskripsi" class="form-control" placeholder="Input Deskripsi" rows="5">{{ $product->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Foto</strong>
                                    <input type="file" class="form-control form-control-md" name="foto"
                                        placeholder="Foto" accept="foto/png, foto/jpeg, foto/jpg" required />
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
