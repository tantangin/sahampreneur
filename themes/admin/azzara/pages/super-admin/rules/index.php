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
                        <a href="<?= base_url('dashboard'); ?>">
                           <i class="flaticon-home"></i>
                        </a>
                     </li>
                     <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                     </li>
                     <li class="nav-item active">
                        <a href="#">List Of Users</a>
                     </li>
                  </ul>
               </div>
               <div class="card">
                  <div class="card-header  d-flex justify-content-between">
                     <div class="card-title"><?= $page_title; ?></div>
                     <a href="<?= base_url('super-admin/rules/add'); ?>" class="btn btn-primary">Add Rules</a>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="basic-datatables" class="table table-hover display table table-striped table-hover">
                           <thead>
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Access User</th>
                                 <th scope="col">Access Menu</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($rules as $key => $rule) : ?>
                                 <tr id="<?= $rule->id; ?>">
                                    <td><?= $key + 1; ?></td>
                                    <td><?= $rule->name; ?></td>
                                    <td>
                                       <a href="<?= base_url('super-admin/access/type/' . $rule->id . "/rule/users"); ?>" class="btn btn-primary btn-sm rounded">Users Access </a>
                                    </td>
                                    <td>
                                       <a href="<?= base_url('super-admin/access/type/' . $rule->id . "/rule/menus"); ?>" class="btn btn-secondary btn-sm rounded">Menus Access</a>
                                    </td>

                                    <td>
                                       <a href="<?= base_url('super-admin/rules/edit/' . $rule->id); ?>" class="btn btn-warning btn-sm rounded">Edit</a>
                                       <a href="<?= base_url('super-admin/rules/delete/' . $rule->id); ?>" class="delete btn btn-danger btn-sm rounded">Delete</a>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view($thema_load . "partials/_custom_templates.php"); ?>
   </div>
   <?php $this->load->view($thema_load . "partials/_js_files.php"); ?>

   <!-- Sweet Alert -->
   <script src="<?= $thema_folder; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
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
            }).then(async (willDelete) => {
               if (willDelete) {
                  let res = await fetch(del.getAttribute('href'), {
                     method: "post"
                  }).then(res => res);
                  if (res) {
                     del.closest("tr").remove();
                     swal("Success  deleted!", {
                        buttons: {
                           confirm: {
                              className: 'btn btn-success'
                           }
                        }
                     });
                  }
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