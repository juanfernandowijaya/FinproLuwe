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
        //$data['userName'] = $this->menu->getUserName();
        $data['userName'] = $this->menu->getMerchantOrder();
        $data['getName'] = $this->menu->getUserName();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('merchant/index', $data);
        $this->load->view('templates/footer');
    }

    public function cancelOrder($id)
    {
        $this->menu->deleteOrder($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Order Berhasil Dicancel!! </div>');
        redirect('merchant/index');
    }

    public function deleteRekomendasi($id)
    {
        $data['tes'] = $this->db->get('user_order')->result_array();
        $this->Menu_model->deleteReko($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Rekomendasi berhasil Dihapus!! </div>');
        redirect('admin/Addrekomendasi');
    }
}
