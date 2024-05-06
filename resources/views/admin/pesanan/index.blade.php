@extends('layouts.admin.app')
@section('title', 'Pesanan')
@section('content')

    <div class="container-fluid">
        <div class="col-lg-12">

            <div class="row my-3">
                <div class="col-lg-6">
                    <h2>Pesanan</h2>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-success" href="{{ route('pesanan.laporan') }}">
                        <i class="fas fa-plus"></i> Cetak Laporan
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th width="30px">No</th>
                                <th>Nama</th>
                                <th>No Handphone</th>
                                <th>Alamat</th>
                                <th>Nama Barang</th>
                                <th>Harga (Rp. )</th>
                                <th>Total Harga</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $pesanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesanan->nama }}</td>
                                    <td>{{ $pesanan->no_hp }}</td>
                                    <td>{{ $pesanan->alamat }}</td>
                                    <td>{{ $pesanan->product->nama_product }}</td>
                                    <td>{{ $pesanan->product->harga_satuan }}</td>
                                    <td>{{ $pesanan->harga_total }}</td>
                                    <td>{{ $pesanan->status }}</td>
                                    <td><img src="{{ url('gambar/foto_bukti/' . $pesanan->bukti_pembayaran) }}"
                                            alt="Product Thumb" width="100" height="100" /></td>

                                    <td>
                                        @if ($pesanan->status == 'Dipesan')
                                            <form action="{{ route('pesanan.diproses', $pesanan->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">diproses</button>
                                            </form>
                                        @endif

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
