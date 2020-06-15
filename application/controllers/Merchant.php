<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'List Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['order'] = $this->db->get('user_order')->result_array();
        $data['userName'] = $this->menu->getUserName();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('merchant/index', $data);
        $this->load->view('templates/footer');
    }

    public function cancelOrder()
    {
        $
    }

    public function deleteRekomendasi($id)
    {
        $this->Menu_model->deleteReko($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Rekomendasi berhasil Dihapus!! </div>');
        redirect('admin/Addrekomendasi');
    }

}
