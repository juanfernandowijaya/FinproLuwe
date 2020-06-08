<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if_login();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            //jika ada gambar
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Your Profile Changed! </div>');
            redirect('user');
        }
    }
    public function changePassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Current Password! </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password ==  $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    New Password cannot similar to old one !!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sukses
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Change Password Success! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function addArtikel()
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'artikel');

        $data['artikel'] = $this->db->get('luwe_artikel')->result_array();
        $data['userId'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('komentar_cust', 'Komentar', 'required');
        $this->form_validation->set_rules('link_instagram', 'Gambar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/artikel', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_user' => $this->input->post('id_user'),
                'nama_user' => $this->input->post('nama_user'),
                'gambar_user' => $this->input->post('gambar_user'),
                'komentar_cust' => $this->input->post('komentar_cust'),
                'tgl_cust' => $this->input->post('tgl_cust'),
                'link_instagram' => $this->input->post('link_instagram'),

            ];
            $this->db->insert('luwe_artikel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Promo berhasil Ditambah!! </div>');
            redirect('user/addArtikel');
        }
    }
    public function deleteArtikel($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->deleteArt($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Artikel berhasil Dihapus!! </div>');
        redirect('user/addArtikel');
    }

    public function order()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'artikel');

        $data['order'] = $this->db->get('user_order')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/order', $data);
        $this->load->view('templates/footer');
    }
    public function deleteOrder($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->deleteOrder1($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Artikel berhasil Dihapus!! </div>');
        redirect('user/order');
    }
}
