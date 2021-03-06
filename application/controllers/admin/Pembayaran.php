<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembayaran extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!in_role("Admin"))
      return $this->not_permition();
    $this->load->library('form_validation');
    $this->load->model(['pembayaran_model', "user_model"]);
  }
  public function index()
  {
    if ($this->input->get("type") == "belum_acc") {
      $this->pembayaran_model->db->where('status', 0);
      $data = [
        'page_title' => "Daftar Pending User",
      ];
    } elseif ($this->input->get("type") == "diterima") {
      $this->data['statusBayar'] = true;
      $this->pembayaran_model->db->where('status', 1);
      $data = [
        'page_title' => "Daftar Approved User",
      ];
    } else {
      $this->data['statusBayar'] = false;
      $this->pembayaran_model->db->where('status', 2);
      $data = [
        'page_title' => "Daftar Rejected  ",
      ];
    }
    $pembayarans = $this->pembayaran_model->all();

    $this->template->load('admin', 'pembayaran/index', array_merge($data, compact(['pembayarans'])));
  }
  public function detail($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);
    if (!$pembayaran) return $this->not_permition();

    if ($this->input->method() == "post") {
      $pembayaran->updated = '  ';
      $pembayaran->updated_at = date("Y-m-d", time());
      if ($this->input->post('alasan')) {
        $pembayaran->alasan = $this->input->post('alasan');
        $pembayaran->status = 2;
        $pembayaran->update();
        flashDataDB("warning", "Pembayaran telah di Tolak");
      } else {
        $pembayaran->status = 1;
        $pembayaran->alasan = " ";
        $pembayaran->update();
        flashDataDB("success", "Pembayaran telah diterima");
        return redirect("admin/pembayaran?type=diterima");
      }
      return redirect("admin/pembayaran?type=rejected");
    }

    $data = [
      'page_title' => "Detail Data Pembayaran User",
    ];
    $this->template->load('admin', 'pembayaran/detail', array_merge($data, compact(['pembayaran'])));
  }
  public function belum_acc()
  {
    $pembayarans = $this->pembayaran_model->all();

    $users = $this->user_model->all();
    $pembayaran = $this->pembayaran_model;

    $this->form_validation->set_rules($pembayaran->getRules());
    if ($this->form_validation->run()) {
      $pembayaran->save();
      flashDataDB("success", "Pembayaran telah di tambahkan");
      return redirect("admin/pembayaran");
    }
    $data = [
      'page_title' => "Tambah Pembayaran Video",
    ];
    $this->template->load('admin', 'pembayaran/tambah', array_merge($data, compact(['pembayaran', "users"])));
  }
  public function edit($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);

    if (!$pembayaran) return $this->not_permition();

    $users = $this->user_model->all();
    $this->form_validation->set_rules($pembayaran->getRules());
    if ($this->form_validation->run()) {
      $pembayaran->update();
      flashDataDB("success", "Pembayaran telah diedit");
      return redirect("admin/pembayaran");
    }
    $data = [
      'page_title' => "Edit Pembayaran dari User",
    ];
    $this->template->load('admin', 'pembayaran/edit', array_merge($data, compact(['pembayaran', "users"])));
  }
  public function delete($id)
  {
    $pembayaran = $this->pembayaran_model->first($id);

    if (!$pembayaran) return $this->not_permition();
    $pembayaran->delete();
    echo json_encode(flashDataDB('success', "Pembayaran dari " . $pembayaran->user()->name . " Berhasil dihapus!"));
  }
}
