<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Mebel
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $mebel['nama']; ?></h5>
                    <h6 class="card-text"><?= $mebel['bahan']; ?></h6>
                    <p class="card-text"><?= $mebel['merk']; ?></p>
                    <p class="card-text"><?= $mebel['harga']; ?></p>
                    <a href="<?= base_url(); ?>mebel" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>