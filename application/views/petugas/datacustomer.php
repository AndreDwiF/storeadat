<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Customer</h6>
              </div>
              <button type="button" class="btn btn-sm bg-gradient-info mt-3" data-bs-toggle="modal" data-bs-target="#modal-formt">
              <span class="btn-inner--icon"><i class="material-icons">add</i></span>
              <span class="btn-inner--text">Tambah</span>
              </button>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Handphone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Member Since</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($customer as $c) : ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <?= ++$start;?>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="<?= base_url('assets/img/') . $c['image'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $c['nama_petugas'];?></h6>
                            <p class="text-xs text-secondary mb-0"><?= $c['email'];?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $c['nohp'];?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?= $c['date_created'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#modal-form<?= $c['id_user'];?>">
                          <span class="btn-inner--icon"><i class="material-icons">edit</i></span>
                          <span class="btn-inner--text">Edit</span>
                        </button>
                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-default<?= $c['id_user'];?>">
                          <span class="btn-inner--icon"><i class="material-icons">delete</i></span>
                          <span class="btn-inner--text">Hapus</span>
                        </button>
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
    <?php foreach ($customer as $ch) : ?>
    <div class="modal fade" id="modal-default<?= $ch['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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
          <form method="post" action="<?= base_url('petugas/hapuscustomer');?>">
          <div class="modal-footer">
            <input type="hidden" name="id_user" value="<?= $ch['id_user'];?>"></input>
            <button type="submit" class="btn bg-gradient-primary">Hapus</button>
            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <?php foreach ($customer as $ce) : ?>
    <div class="modal fade" id="modal-form<?= $ce['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-left">
                <h5 class="">Edit Data</h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post" action="<?= base_url('petugas/editcustomer');?>">
                <div class="input-group input-group-dynamic mb-3">
                  <input type="hidden" name="id_user" value="<?= $ce['id_user']; ?>">
                  <input type="text" class="form-control" placeholder="Nama Customer" aria-label="Recipient's username" aria-describedby="basic-addon2" name="namacustomer" value="<?= $ce['nama_petugas'];?>">
                  <span class="input-group-text" id="basic-addon2">ex: John Doe</span>
                </div>
                <div class="input-group input-group-dynamic mb-3">
                  <input type="text" class="form-control" placeholder="No. Handphone" aria-label="Recipient's username" aria-describedby="basic-addon2" name="nohp" value="<?= $ce['nohp'];?>">
                  <span class="input-group-text" id="basic-addon2">ex: 089XXXx</span>
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
                <form role="form text-left" method="post" action="<?= base_url('petugas/tambahcustomer');?>">
                <div class="input-group input-group-dynamic mb-3">
                  <label class="form-label" for="basic-url">Nama Petugas</label>
                  <span class="input-group-text" id="basic-addon3">ex: John Doe</span>
                  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="namacustomer">
                </div>
                <div class="input-group input-group-dynamic mb-3">
                  <label class="form-label" for="basic-url">No. Handphone</label>
                  <span class="input-group-text" id="basic-addon3">ex: 089XXXx</span>
                  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="nohp">
                </div>
                <div class="input-group input-group-static my-3">
                  <label>Date Created</label>
                  <input type="date" class="form-control" name="date_created">
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