@extends('layouts.admin.app')
@section('title', 'Prouct')
@section('content')

    <div class="container-fluid">
        <div class="col-lg-12">

            <div class="row my-3">
                <div class="col-lg-6">
                    <h2>Product</h2>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-success" href="{{ route('product.create') }}">
                        <i class="fas fa-plus"></i> Add product
                    </a>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success text-center">
                    <h6>{{ $message }}</h6>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data About</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th width="30px">No</th>
                                <th>Nama Produk</th>
                                <th>Harga Satuan (Rp.)</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->nama_product }}</td>
                                    <td>{{ $product->harga_satuan }}</td>
                                    <td>{{ $product->deskripsi }}</td>
                                    <td><img src="{{ url('gambar/foto_product/' . $product->foto) }}" alt="Product Thumb"
                                            width="100" height="100" /></td>

                                    <td>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                            <a class="btn btn-primary"
                                                href="{{ route('product.edit', $product->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
