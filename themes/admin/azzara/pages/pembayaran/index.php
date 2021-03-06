<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($thema_load . "partials/_head.php"); ?>

</head>

<body>
  <div class="wrapper">

    <?php $this->load->view($thema_load . "partials/_main_header.php"); ?>
    <?php $this->load->view($thema_load . "partials/_sidebar.php"); ?>

    <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $page_title; ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="<?= base_url(); ?>">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href=<?= base_url('dashboard'); ?>>Dashboard</a>
              </li>

              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item active">
                <a href="#">Pembayaran</a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header  d-flex justify-content-between">
              <div class="card-title"><?= $page_title; ?></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="basic-datatables" class="table table-hover display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama User</th>
                      <th scope="col">Referall </th>
                      <th scope="col">Tanggal Upload</th>
                      <?php if (isset($statusBayar)) : ?>
                        <th scope="col"><?= $statusBayar ? "Tanggal di Verifikasi" : "Tanggal di Tolak"; ?></th>
                      <?php endif; ?>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($pembayarans as $pembayaran) :
                      $pembayaran->user();
                    ?>
                      <tr class="key_me">
                        <td><?= $no++; ?></td>
                        <td><?= $pembayaran->user->name; ?></td>
                        <td>
                          <?php if ($pembayaran->user->referal()) : ?>
                            <?= $pembayaran->user->referal()->name; ?> || <?= $pembayaran->user->referal()->username; ?>
                          <?php else :; ?>
                            Kosong
                          <?php endif; ?>
                        </td>
                        <td><?= date("d-m-Y", strtotime($pembayaran->created_at)); ?></td>
                        <?php if (isset($statusBayar)) : ?>
                          <td><?= date("d-m-Y", strtotime($pembayaran->updated_at)); ?></td>
                        <?php endif; ?>
                        <td>
                          <a href="<?= base_url('admin/pembayaran/detail/' . $pembayaran->id); ?>" class="btn btn-info">
                            <span class="btn-label">
                              <i class="fa fa-info"></i>
                              Details <?php if ($pembayaran->updated) : ?> <sup class="text-danger">new</sup> <?php endif; ?>
                            </span>
                          </a> </td>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view("footers/style1.php"); ?>

      </div>
    </div>

  </div>
  <!-- Sweet Alert -->
  <script src="<?= $thema_folder; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>
  <script>
    var baseurl = "<?= base_url() ?>";

    [...document.querySelectorAll(".delete")].forEach(del => {
      del.addEventListener('click', e => {
        e.preventDefault();
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          buttons: {
            cancel: {
              visible: true,
              text: 'No, cancel!',
              className: 'btn btn-danger'
            },
            confirm: {
              text: 'Yes, delete it!',
              className: 'btn btn-success'
            }
          }
        }).then((willDelete) => {
          if (willDelete) {
            let url = del.getAttribute('href');
            fetch(url, {
              method: "post"
            }).then(res => res.json()).then(res => {
              res.status && del.closest(".key_me").remove();
              swal(res.message, {
                buttons: {
                  confirm: {
                    className: `btn btn-${res.status ? "success" : "danger"}`
                  }
                }
              });
            })
          } else {
            swal("Tidak jadi dihapus!!", {
              buttons: {
                confirm: {
                  className: 'btn btn-success'
                }
              }
            });
          }
        });

      })
    });
  </script>

</body>

</html>