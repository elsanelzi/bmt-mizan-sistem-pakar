<div class="content-wrapper">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#pending" class="nav-link active" data-toggle="tab">Pending</a></li>
        <li><a href="#diproses" class="nav-link" data-toggle="tab">Diproses</a></li>
        <li><a href="#dicancel" class="nav-link" data-toggle="tab">Dicancel Pelanggan</a></li>
        <li><a href="#dicancel_admin" class="nav-link" data-toggle="tab">Dicancel Admin</a></li>
        <li><a href="#konfirmasi_bayar" class="nav-link" data-toggle="tab">Konfirmasi Bayar</a></li>
        <li><a href="#dikirim" class="nav-link" data-toggle="tab">Dikirim</a></li>
        <li><a href="#selesai" class="nav-link" data-toggle="tab">Selesai</a></li>
    </ul>
    <!-- Main content -->
    <section class="content">
        <div class="tab-content">
            <!-- Menampilkan pesanan dengan status order = pending -->
            <div id="pending" class="tab-pane fade-in active">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background-color:aqua; font-size:9px">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Antar</th>
                                <th>Nama Paket & Kuantitas</th>
                                <th>Total Harga</th>
                                <th>Status Order</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Menampilkan pesanan dengan status order = pending -->
            <div id="diproses" class="tab-pane fade-in">
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background-color:aqua; font-size:9px">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>