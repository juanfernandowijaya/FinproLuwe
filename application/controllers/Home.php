<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    // public function __construct()
    // {
    //    parent::__construct();
    //   if_login();
    // }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $data['title'] = 'Luwe';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $data['userAll'] = $this->db->get('user')->row_array();
            // load rekomendasi
            $this->load->model('Menu_model', 'rekomendasi');
            $data['rekomendasi'] = $this->rekomendasi->getRekomendasi();
            //load promo
            $this->load->model('Menu_model', 'promo');
            $data['promo'] = $this->promo->getPromo();
            //load kode promo
            $this->load->model('Menu_model', 'kode_promo');
            $data['kode_promo'] = $this->kode_promo->getKodePromo();

            //load artikel
            $this->load->model('Menu_model', 'artikel');
            $data['artikel'] = $this->artikel->getArtikel();
            //load galleri
            $this->load->model('Menu_model', 'galleri');
            $data['galleri'] = $this->galleri->getGaleri();

            $this->load->view('templates/home_header', $data);
            $this->load->view('home/index_log', $data);
            $this->load->view('templates/home_footer');
        } else if ($this->form_validation->run() == false) {
            $data['title'] = 'Luwe';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->load->model('Menu_model', 'rekomendasi');
            $data['rekomendasi'] = $this->rekomendasi->getRekomendasi();
            //load promo
            $this->load->model('Menu_model', 'promo');
            $data['promo'] = $this->promo->getPromo();
            //load kode promo
            $this->load->model('Menu_model', 'kode_promo');
            $data['kode_promo'] = $this->kode_promo->getKodePromo();

            //load artikel
            $this->load->model('Menu_model', 'artikel');
            $data['artikel'] = $this->artikel->getArtikel();
            //load galleri
            $this->load->model('Menu_model', 'galleri');
            $data['galleri'] = $this->galleri->getGaleri();




            $this->load->view('templates/home_header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/home_footer');
        }
    }
    public function detail_MakananTradisional()
    {
        $data['title'] = 'Makanan Tradisional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu');

        $data['getUser'] = $this->db->get('user')->result_array();
        $data['getUserId'] = $this->db->get('user_order')->result_array();
        $data['getTradisional'] = $this->db->get('luwe_tradisional')->result_array();
        $data['getTradisionalGalleri'] = $this->db->get('luwe_tradisional_gambar')->result_array();
        $data['getTradisionalItem'] = $this->db->get('luwe_makanan_item')->result_array();

        $this->form_validation->set_rules('pesanMinuman', 'Pesanan', 'required');
        $this->form_validation->set_rules('pesanTanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('pesanAlamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('home/detail_produk', $data);
        } else {
            $data = [
                'nama_makanan' => $this->input->post('nama_makanan'),
                'order_date' => $this->input->post('order_date'),
                'id_user' => $this->input->post('user_id'),
                'order_des' => $this->input->post('pesanMinuman'),
                'order_time' => $this->input->post('pesanTanggal'),
                'order_alamat' => $this->input->post('pesanAlamat'),
            ];
            $this->db->insert('user_order', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Order Berhasil!! </div>');
            redirect('home/detail_MakananTradisional');
        }
    }
    public function detail_Minuman()
    {
        $data['title'] = 'Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getMinuman'] = $this->db->get('luwe_minuman')->result_array();
        $data['getMinumanGalleri'] = $this->db->get('luwe_minuman_gambar')->result_array();
        $data['getMinumanItem'] = $this->db->get('luwe_minuman_item')->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('home/detail_produk_minuman', $data);
        } else {
            $data = [
                'nama_makanan' => $this->input->post('nama_makanan'),
                'order_date' => $this->input->post('order_date'),
                'id_user' => $this->input->post('user_id'),
                'order_des' => $this->input->post('pesanMinuman'),
                'order_time' => $this->input->post('pesanTanggal'),
                'order_alamat' => $this->input->post('pesanAlamat'),
            ];
            $this->db->insert('user_order', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Order Berhasil!! </div>');
            redirect('home/detail_produk_minuman');
        }
    }

    public function detail_OlehOleh()
    {
        $data['title'] = 'Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getOleh'] = $this->db->get('luwe_oleholeh')->result_array();
        $data['getOlehGalleri'] = $this->db->get('luwe_oleholeh_gambar')->result_array();
        $data['getOlehItem'] = $this->db->get('luwe_oleholeh_item')->result_array();


        if ($this->form_validation->run() == false) {
            $this->load->view('home/detail_produk_oleh', $data);
        } else {
            $data = [
                'nama_makanan' => $this->input->post('nama_makanan'),
                'order_date' => $this->input->post('order_date'),
                'id_user' => $this->input->post('user_id'),
                'order_des' => $this->input->post('pesanMinuman'),
                'order_time' => $this->input->post('pesanTanggal'),
                'order_alamat' => $this->input->post('pesanAlamat'),
            ];
            $this->db->insert('user_order', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Order Berhasil!! </div>');
            redirect('home/detail_produk_oleh');
        }
    }
}
