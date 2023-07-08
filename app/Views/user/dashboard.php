<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                Admin Peminjaman Ruangan
            </div>
        </div>
    </div>
</section>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="<?= base_url('user/processBooking') ?>" method="POST">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                    <label for="pilih_ruangan">Pilih Ruangan:</label>
                    <input type="text" id="pilih_ruangan" name="pilih_ruangan" required>
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                    <label for="jam_mulai">Jam Mulai:</label>
                    <input type="date" id="jam_mulai" name="jam_mulai" required>
                    <label for="jam_selesai">Jam Selesai:</label>
                    <input type="date" id="jam_selesai" name="jam_selesai" required>
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" id="keterangan" name="keterangan" required>
                    <!-- Tambahkan elemen form untuk booking ruangan di sini -->
                    <button type="submit">BOOKING</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->