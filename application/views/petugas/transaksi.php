<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Transaksi</h6>
              </div>
              <button type="button" class="btn btn-sm bg-gradient-info mt-3" data-bs-toggle="modal" data-bs-target="#modal-formt">
              <span class="btn-inner--icon"><i class="material-icons">add</i></span>
              <span class="btn-inner--text">Tambah</span>
              </button>
              <div class="ms-md-auto col-2 pe-md-3 d-flex align-items-center">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Petugas</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pakaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Input</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dateline</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($transaksi as $t) : ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <?= ++$start;?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['nama_petugas_customer'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['nama_petugas_petugas'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['nama_pakaian'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <img src="<?= base_url('assets/img/') . $t['image'];?>" class="avatar avatar-sm me-auto border-radius-lg" alt="user1">
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['tanggal_input'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['jumlah'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['dateline'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $t['total'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if($t['status']==1) : ?>
                        <span class="badge badge-sm bg-gradient-success">Lunas</span>
                        <?php else : ?>
                        <span class="badge badge-sm bg-gradient-primary">Belum</span>
                      </td>
                      <?php endif;?>
                      <?php $data = array(
                      'total'=> $t['total']
                      );
                      $where = array(
                        'id' => $t['id']
                      );
                      $this->db->where($where);
                      $this->db->update('transaksi',$data);
                      ?>
                      <td class="align-middle text-center text-sm">
                        <span class="fa-solid fa-wand-magic" style="color:#fb8c00; margin-right: 3px;" type="button" data-bs-toggle="modal" data-bs-target="#modal-form<?= $t['id'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"></span>
                        <span class="fa-solid fa-delete-left" style="color:#e91e63; margin-left: 3px;" type="button" data-bs-toggle="modal" data-bs-target="#modal-default<?= $t['id'];?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"></span>                        
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
      <!-- Modal -->
    <?php foreach ($transaksi as $th) : ?>
    <div class="modal fade" id="modal-default<?= $th['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal" id="modal-title-default">Hapus Data</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="text-center">
          <i class="fa-solid fa-bell fa-shake fa-2xl"></i>
          <p></p>
          <p>Apakah anda yakin?</p>
          </div>
          </div>
          <form method="post" action="<?= base_url('petugas/hapustransaksi');?>">
          <div class="modal-footer">
            <input type="hidden" name="id" value="<?= $th['id'];?>"></input>
            <button type="submit" class="btn bg-gradient-primary">Hapus</button>
            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php foreach ($transaksi as $te) : ?>
    <div class="modal fade" id="modal-form<?= $te['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">Edit Data</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" action="<?= base_url('petugas/edittransaksi');?>">
                <div class="input-group input-group-dynamic mb-3">
                  <input type="hidden" name="id" value="<?= $te['id']; ?>">
                  <input type="text" class="form-control" placeholder="Jumlah" aria-label="Recipient's username" aria-describedby="basic-addon2" name="jumlah" value="<?= $te['jumlah'];?>">
                  <span class="input-group-text" id="basic-addon2">ex: 7</span>
                </div>
                <div class="input-group input-group-dynamic mb-3">
                  <input type="text" class="form-control" placeholder="Harga" aria-label="Recipient's username" aria-describedby="basic-addon2" name="tanggal_input" value="<?= $te['tanggal_input'];?>">
                  <span class="input-group-text" id="basic-addon2">ex: 20-08-2023</span>
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-warning">Edit</button>
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <div class="modal fade" id="modal-formt" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">Tambah Data</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" action="<?= base_url('petugas/tambahtransaksi');?>">
                <div class="input-group input-group-dynamic mb-3">
                  <label class="form-label" for="basic-url">Customer</label>
                  <span class="input-group-text" id="basic-addon3">ex: Michael</span>
                  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="user_id">
                </div>
                <div class="input-group input-group-dynamic mb-3">
                  <label class="form-label" for="basic-url">Harga</label>
                  <span class="input-group-text" id="basic-addon3">ex: 089XXXx</span>
                  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="harga">
                </div>
                <div class="input-group input-group-static my-3">
                  <label>Tanggal Input</label>
                  <input type="date" class="form-control" name="tanggal_input">
                </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-info">Tambah</button>
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <script>
          <?php if($this->session->flashdata('success')) {?>
          Swal.fire(
          'Data Berhasil Di Simpan!',
          'Klik Untuk Melanjutkan!',
          'success'
        )
        <?php }?>
        </script>
        <script>
          $(document).on('click','#button',function(){
            $('exampleModalMessage').show();
          })
        </script>