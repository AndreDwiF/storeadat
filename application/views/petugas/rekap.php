<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Rekapitulasi<br></h6>
                <h9 class="text-white text-sm text-capitalize ps-3"> <?= date("d F Y", strtotime($daterange->tanggal_awal));?> - <?= date("d F Y", strtotime($daterange->tanggal_akhir));?></h9>
              </div>
              <div class="ms-md-auto mt-3 col-2 pe-md-3 d-flex align-items-center">
                <form action="<?= base_url('petugas/transaksi');?>" method="post">
                  <div class="input-group input-group-dynamic mb-4">
                    <label class="form-label">Search keyword...</label>
                    <input type="search" class="form-control" name="keyword" autofocus>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pakaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Total</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($rekap as $r) : ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <?= ++$start;?>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?= base_url('assets/img/') . $r['image'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $r['nama_pakaian'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $r['harga'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $r['totalj'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $r['totalh'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="fa-solid fa-wand-magic" style="color:#fb8c00; margin-right: 3px;" type="button" data-bs-toggle="modal" data-bs-target="#modal-form<?= $r['id'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"></span>
                        <span class="fa-solid fa-delete-left" style="color:#e91e63; margin-left: 3px;" type="button" data-bs-toggle="modal" data-bs-target="#modal-default<?= $r['id'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"></span>                        
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
                <?= $this->pagination->create_links();?>
              </div>
            </div>
          </div>
        </div>
      </div>