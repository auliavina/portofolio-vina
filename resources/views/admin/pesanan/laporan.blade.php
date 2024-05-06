<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portofolio Vina-Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">


    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="col-lg-12">

            <div class="row my-3">
                <div class="col-lg-6">
                </div>
            </div>


            <div class="card mb-4">
                <div class="kop-surat py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/assets/admin/img/logo.jpg" width="100">
                            </div>
                            <div class="col-md-10 d-flex align-items-center justify-content-center">
                                <div>
                                    <h2 class="mb-0">Motor Bekas Sumbar</h2>
                                    <p class="col-md-10 d-flex align-items-center justify-content-center">LAPORAN
                                        PENJUALAN</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <th>Status</th>
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
                                    <td>{{ number_format($pesanan->product->harga_satuan, 0, ',', '.') }}</td>
                                    <td>{{ number_format($pesanan->harga_total, 0, ',', '.') }}</td>
                                    <td>{{ $pesanan->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <thead>
                            @php
                                $totalHarga = 0;
                            @endphp

                            @foreach ($pesanans as $pesanan)
                                @php
                                    $totalHarga += $pesanan->harga_total;
                                @endphp
                            @endforeach
                            <tr>
                                <th width="30px"></th>
                                <th colspan="5">Jumlah</th>
                                <th>RP. {{ number_format($totalHarga, 0, ',', '.') }}</th>
                                <th></th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>


    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="/assets/admin/js/demo/chart-pie-demo.js"></script>


    <!-- Page level plugins -->
    <script src="/assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/admin/js/demo/datatables-demo.js"></script>



    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>
