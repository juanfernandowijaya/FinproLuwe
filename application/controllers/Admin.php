<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if_login();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function Addrekomendasi()
    {
        $data['title'] = 'Rekomendasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'rekomendasi');

        $data['rekomendasi'] = $this->db->get('luwe_rekomendasi')->result_array();

        $this->form_validation->set_rules('gambar_produk', 'Title', 'required');
        $this->form_validation->set_rules('nama_produk', 'Menu', 'required');
        $this->form_validation->set_rules('deskripsi_produk', 'URL', 'required');
        $this->form_validation->set_rules('link_produk', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/rekomendasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'gambar_produk' => $this->input->post('gambar_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi_produk' => $this->input->post('deskripsi_produk'),
                'link_produk' => $this->input->post('link_produk'),

            ];
            $this->db->insert('luwe_rekomendasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Rekomendasi berhasil Ditambah!! </div>');
            redirect('admin/Addrekomendasi');
        }
    }

    public function deleteRekomendasi($id)
    {
        $this->Menu_model->deleteReko($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Rekomendasi berhasil Dihapus!! </div>');
        redirect('admin/Addrekomendasi');
    }

    public function addPromo()
    {
        $data['title'] = 'Promo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'promo');

        $data['promo'] = $this->db->get('luwe_promo')->result_array();
        $data['getPromo'] = $this->db->get('luwe_kode_promo')->result_array();

        $this->form_validation->set_rules('promo_nama', 'Nama', 'required');
        $this->form_validation->set_rules('promo_deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('promo_gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('promo_data_target', 'Data Target', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/promo', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'promo_nama' => $this->input->post('promo_nama'),
                'promo_deskripsi' => $this->input->post('promo_deskripsi'),
                'promo_gambar' => $this->input->post('promo_gambar'),
                'promo_data_target' => $this->input->post('promo_data_target'),

            ];
            $this->db->insert('luwe_promo', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/addPromo');
        }
    }
    public function addSubPromo($id)
    {
        $data['title'] = 'Promo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['getKodePromo'] = $this->db->get('luwe_kode_promo')->result_array();
        $data['getPromo'] = $this->db->get('luwe_kode_promo')->result_array();

        $this->form_validation->set_rules('kode_promo', 'Kode Promo', 'required');
        $this->form_validation->set_rules('kuota_promo', 'Kuota Promo', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/promo', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kode_promo' => $id,
                'kode_promo' => $this->input->post('kode_promo'),
                'kuota_promo' => $this->input->post('kuota_promo'),
            ];
            $this->db->insert('luwe_kode_promo', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/addPromo');
        }
    }

    public function deletePromo($id)
    {
        $this->Menu_model->deletePro($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Promo berhasil Dihapus!! </div>');
        redirect('admin/addPromo');
    }
    public function deleteSubPromo($id)
    {
        $this->Menu_model->deleteSubPro($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Promo berhasil Dihapus!! </div>');
        redirect('admin/addPromo');
    }

    public function addGambar()
    {
        $data['title'] = 'Galeri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'galleri');

        $data['galleri'] = $this->db->get('luwe_galleri')->result_array();

        $this->form_validation->set_rules('galeri_deskripsi', 'Nama', 'required');
        $this->form_validation->set_rules('galeri_gambar', 'Deskripsi', 'required');
        $this->form_validation->set_rules('galeri_data_target', 'Gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/galeri', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'galeri_data_target' => $this->input->post('galeri_data_target'),
                'galeri_gambar' => $this->input->post('galeri_gambar'),
                'galeri_deskripsi' => $this->input->post('galeri_deskripsi'),
            ];
            $this->db->insert('luwe_galleri', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/addGambar');
        }
    }
    public function deleteGalleri($id)
    {
        $this->Menu_model->deleteGal($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Promo berhasil Dihapus!! </div>');
        redirect('admin/addGambar');
    }
    public function tradisional()
    {
        $data['title'] = 'Makanan Tradisional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'galleri');

        $data['tradisional'] = $this->db->get('luwe_tradisional')->result_array();
        $data['tradisionalItem'] = $this->db->get('luwe_makanan_item')->result_array();
        $data['tradisionalGambar'] = $this->db->get('luwe_tradisional_gambar')->result_array();

        $this->form_validation->set_rules('gambar_produk', 'Gambar', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('lokasi_produk', 'Lokasi', 'required');
        $this->form_validation->set_rules('jam_produk', 'Jam', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga', 'required');
        $this->form_validation->set_rules('link_produk', 'Link', 'required');
        $this->form_validation->set_rules('data_produk1', 'Data Target 01', 'required');
        $this->form_validation->set_rules('data_produk2', 'Data Target 02', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tradisional', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'gambar_makanan' => $this->input->post('gambar_produk'),
                'nama_makanan' => $this->input->post('nama_produk'),
                'lokasi_makanan' => $this->input->post('lokasi_produk'),
                'jambuka_makanan' => $this->input->post('jam_produk'),
                'harga_makanan' => $this->input->post('harga_produk'),
                'link_makanan' => $this->input->post('link_produk'),
                'detail_data_target' => $this->input->post('data_produk1'),
                'detail_item_target' => $this->input->post('data_produk2'),

            ];
            $this->db->insert('luwe_tradisional', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/tradisional');
        }
    }
    public function addMenuTradisional($id)
    {
        $data['title'] = 'Makanan Tradisional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['tradisional'] = $this->db->get('luwe_tradisional')->result_array();
        $data['tradisionalItem'] = $this->db->get('luwe_makanan_item')->result_array();

        $this->form_validation->set_rules('nama_menu_tradisional', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga_menu_tradisional', 'Harga Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tradisional', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'makanan_id' => $id,
                'nama_makanan' => $this->input->post('nama_menu_tradisional'),
                'harga_makanan' => $this->input->post('harga_menu_tradisional'),
            ];
            $this->db->insert('luwe_makanan_item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/tradisional');
        }
    }
    public function addTradisionalGallery($id)
    {
        $data['title'] = 'Makanan Tradisional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['tradisional'] = $this->db->get('luwe_tradisional')->result_array();
        $data['tradisionalItem'] = $this->db->get('luwe_makanan_item')->result_array();
        $data['tradisionalGallery'] = $this->db->get('luwe_tradisional_gambar')->result_array();

        $this->form_validation->set_rules('gambar_tradisional', 'Image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tradisional', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kode_tradisional' => $id,
                'tradisional_gambar' => $this->input->post('gambar_tradisional'),
            ];
            $this->db->insert('luwe_tradisional_gambar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil Ditambah!! </div>');
            redirect('admin/tradisional');
        }
    }
    public function deleteMakananTradisional($id)
    {
        $this->Menu_model->deleteMakananTradisional($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/tradisional');
    }
    public function deleteTradisionalMenu($id)
    {
        $this->Menu_model->deleteTradisionalMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/tradisional');
    }
    public function deleteTradisionalGalleri($id)
    {
        $this->Menu_model->deleteTradisionalGalleri($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/tradisional');
    }


    public function minuman()
    {
        $data['title'] = 'Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'galleri');

        $data['minuman'] = $this->db->get('luwe_minuman')->result_array();
        $data['minumanItem'] = $this->db->get('luwe_minuman_item')->result_array();
        $data['minumanGallery'] = $this->db->get('luwe_minuman_gambar')->result_array();

        $this->form_validation->set_rules('gambar_produk', 'Gambar', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('lokasi_produk', 'Lokasi', 'required');
        $this->form_validation->set_rules('jam_produk', 'Jam', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga', 'required');
        $this->form_validation->set_rules('link_produk', 'Link', 'required');
        $this->form_validation->set_rules('data_produk1', 'Data Target 01', 'required');
        //$this->form_validation->set_rules('data_produk2', 'Data Target 02', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/minuman', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'gambar_minuman' => $this->input->post('gambar_produk'),
                'nama_minuman' => $this->input->post('nama_produk'),
                'lokasi_minuman' => $this->input->post('lokasi_produk'),
                'jambuka_minuman' => $this->input->post('jam_produk'),
                'harga_minuman' => $this->input->post('harga_produk'),
                'link_minuman' => $this->input->post('link_produk'),
                'minuman_data_target' => $this->input->post('data_produk1'),
            ];
            $this->db->insert('luwe_minuman', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/minuman');
        }
    }

    public function addMenuMinuman($id)
    {
        $data['title'] = 'Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['minuman'] = $this->db->get('luwe_minuman')->result_array();
        $data['minumanItem'] = $this->db->get('luwe_minuman_item')->result_array();

        $this->form_validation->set_rules('nama_menu_tradisional', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga_menu_tradisional', 'Harga Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/minuman', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'minuman_id' => $id,
                'nama_minuman' => $this->input->post('nama_menu_tradisional'),
                'harga_minuman' => $this->input->post('harga_menu_tradisional'),
            ];
            $this->db->insert('luwe_minuman_item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('admin/minuman');
        }
    }
    public function addMinumanGallery($id)
    {
        $data['title'] = 'Minuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['minuman'] = $this->db->get('luwe_minuman')->result_array();
        $data['minumanItem'] = $this->db->get('luwe_minuman_item')->result_array();
        $data['minumanGallery'] = $this->db->get('luwe_minuman_gambar')->result_array();

        $this->form_validation->set_rules('gambar_minuman', 'Gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/minuman', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_minuman' => $id,
                'gambar_minuman' => $this->input->post('gambar_minuman'),
            ];
            $this->db->insert('luwe_minuman_gambar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Gambar berhasil Ditambah!! </div>');
            redirect('admin/minuman');
        }
    }
    public function deleteMinuman($id)
    {
        $this->Menu_model->deleteMinuman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }
    public function deleteMenuMinuman($id)
    {

        $this->Menu_model->deleteMenuMinuman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }
    public function deleteMinumanGallery($id)
    {
        $this->Menu_model->deleteMinumanGallery($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Gallery berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }

    public function olehOleh()
    {
        $data['title'] = 'Oleh Oleh';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'galleri');

        $data['oleholeh'] = $this->db->get('luwe_oleholeh')->result_array();
        $data['OlehItem'] = $this->db->get('luwe_oleholeh_item')->result_array();
        $data['olehGallery'] = $this->db->get('luwe_oleholeh_gambar')->result_array();

        $this->form_validation->set_rules('gambar_produk', 'Gambar', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('lokasi_produk', 'Lokasi', 'required');
        $this->form_validation->set_rules('jam_produk', 'Jam', 'required');
        $this->form_validation->set_rules('harga_produk', 'Harga', 'required');
        $this->form_validation->set_rules('link_produk', 'Link', 'required');
        $this->form_validation->set_rules('data_produk1', 'Data Target 01', 'required');
        $this->form_validation->set_rules('data_produk2', 'Data Target 02', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/oleholeh', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'gambar_oleh' => $this->input->post('gambar_produk'),
                'nama_oleh' => $this->input->post('nama_produk'),
                'lokasi_oleh' => $this->input->post('lokasi_produk'),
                'jambuka_oleh' => $this->input->post('jam_produk'),
                'harga_oleh' => $this->input->post('harga_produk'),
                'link_oleh' => $this->input->post('link_produk'),
                'oleh_data_target' => $this->input->post('data_produk1'),
                'oleh_item_target' => $this->input->post('data_produk2'),
            ];
            $this->db->insert('luwe_oleholeh', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Oleh-Oleh berhasil Ditambah!! </div>');
            redirect('admin/olehOleh');
        }
    }
    public function addMenuOleh($id)
    {
        $data['title'] = 'Oleh Oleh';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['oleholeh'] = $this->db->get('luwe_oleholeh')->result_array();
        $data['OlehItem'] = $this->db->get('luwe_oleholeh_item')->result_array();

        $this->form_validation->set_rules('nama_menu_tradisional', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga_menu_tradisional', 'Harga Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/olehOleh', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'oleholeh_id' => $id,
                'nama_oleh' => $this->input->post('nama_menu_tradisional'),
                'harga_oleh' => $this->input->post('harga_menu_tradisional'),
            ];
            $this->db->insert('luwe_oleholeh_item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Oleh-Oleh Menu berhasil Ditambah!! </div>');
            redirect('admin/olehOleh');
        }
    }
    public function addOlehGallery($id)
    {
        $data['title'] = 'Oleh Oleh';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'getKodePromo');

        $data['oleholeh'] = $this->db->get('luwe_oleholeh')->result_array();
        $data['OlehItem'] = $this->db->get('luwe_oleholeh_item')->result_array();
        $data['olehGallery'] = $this->db->get('luwe_oleholeh_gambar')->result_array();

        $this->form_validation->set_rules('gambar_oleh', 'Nama Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/olehOleh', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_oleh' => $id,
                'gambar_oleh' => $this->input->post('gambar_oleh'),
            ];
            $this->db->insert('luwe_oleholeh_gambar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Oleh-Oleh Gambar berhasil Ditambah!! </div>');
            redirect('admin/olehOleh');
        }
    }
    public function deleteOleh($id)
    {
        $this->Menu_model->deleteOleh($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Minuman berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }
    public function deleteOlehMenu($id)
    {
        $this->Menu_model->deleteOlehMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }
    public function deleteOlehGallery($id)
    {
        $this->Menu_model->deleteOlehGallery($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Gallery berhasil Dihapus!! </div>');
        redirect('admin/minuman');
    }



    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed! </div>');
    }

    public function userAcc()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['userA'] = $this->db->get('user')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/user', $data);
        $this->load->view('templates/footer');
    }
    public function masterOrder()
    {
        $data['title'] = 'Master Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['order'] = $this->db->get('user_order')->result_array();
        $data['userData'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/masterOrder', $data);
        $this->load->view('templates/footer');
    }
    public function deleteOrder($id)
    {
        $this->Menu_model->deleteOrder($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Order berhasil Dihapus!! </div>');
        redirect('admin/masterOrder');
    }
}
