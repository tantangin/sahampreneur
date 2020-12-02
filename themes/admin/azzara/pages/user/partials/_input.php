<center>
  <?php if (isset($user_edit->name_rules) && $user_edit->name_rules == "Admin") : ?>
    <div class="card-avatar">
      <input type="file" name="gambar" id="imagechange" class="d-none" />
      <a href="#pablo" id="changePhoto">
        <img class="img thumbnail rounded-circle" style="width: 100px;height:100px;" src="<?= $user_edit->takeProfile() ?>">
      </a>
      <h3 class="mt-4">Profile Picture</h3>
    <?php endif; ?>
</center>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Nama</label>
      <input type="text" class="form-control" name="name" placeholder="Nama" value="<?= set_value("name", null) ?? $user_edit->name ?? ""; ?>">
    </div>
    <?= form_error("name", "<div class='text-danger pl-2'>", "</div>"); ?>

  </div>
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value("username", null) ?? $user_edit->username ?? ""; ?>">
    </div>
    <?= form_error("username", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>

</div>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Status</label>
      <select class="form-control" id="status" name="status">
        <option disable>Pilih Status</option>
        <option value="1" <?= set_value("status") == 1  ? "selected" : ''; ?>>Aktif</option>
        <option value="0" <?= set_value("status") == 0 ? "selected" : ''; ?>>Non Aktif</option>
      </select>
    </div>
    <?= form_error("status", "<div class='text-danger pl-2'>", "</div>"); ?>

  </div>
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Pilih level Admin</label>
      <select class="form-control" id='role_id' name='role_id'>
        <option disabled selected>Pilih Level</option>
        <?php foreach ($rules as $role) : ?>
          <option value="<?= $role->id; ?>" <?= set_value("role_id") == $role->id ? "selected" : ($user_edit->role_id == $role->id ? "selected" : ''); ?>><?= $role->name; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <?= form_error("role_id", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>
</div>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value("email", null) ?? $user_edit->email ?? ''; ?>">
    </div>
    <?= form_error("email", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>
  <div class="col-md-6">
    <div class="form-group form-group-default">
      <label>Jabatan Admin ( Khusus Admin )
      </label>
      <input class="form-control" name="jabatan" value="<?= set_value("jabatan", null) ??  $user_edit->jabatan ?? ''; ?>">
    </div>
    <?= form_error("jabatan", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>
</div>
<?php if ($user_edit->name) : ?>
  <h3 class="text-danger mt-5">Kosongkan password jika tidak ingin diubah</h3>
<?php endif; ?>
<div class="row mt-3">
  <div class="col-6">
    <div class="form-group form-group-default">
      <label>Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <?= form_error("password", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>
  <div class="col-6">
    <div class="form-group form-group-default">
      <label>Confirm Password</label>
      <input type="password" class="form-control" name="confirmpassword">
    </div>
    <?= form_error("confirmpassword", "<div class='text-danger pl-2'>", "</div>"); ?>
  </div>
</div>