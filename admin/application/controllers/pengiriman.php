<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following desk
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/desks.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dropdown');
    }
    public function index()
    {
        if ($this->session->userdata("admin_username") != "") {
            $page = $this->uri->segment(4);
            $limit = 10;
            if (!$page) :
                $offset = 0;
            else :
                $offset = $page;
            endif;

            $d['profil'] = $this->db->query("SELECT deskripsi_profil FROM profil");

            $config['base_url'] = base_url() . 'profil/index/';
            $config['total_rows'] = $this->db->get("profil")->num_rows();
            $config['per_page']   = $limit;
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);
            $d['pagination'] = $this->pagination->create_links();

            $d['content'] = "pengiriman/profil_view";
            $tema = $this->cilinaya_model->get_table('tema');
            $d['tema'] = $tema;
            $this->load->view('dashboard', $d);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
        }
    }

    function save()
    {
        if ($this->session->userdata("admin_username") != "") {
            $deskripsi    = $this->input->post('deskripsi_profil');
            $this->db->query("
				 UPDATE profil SET 
				 deskripsi_profil = '$deskripsi'");
            redirect(base_url("profil"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
        }
    }

    public function show_pengiriman()
    {
        $this->load->model('cilinaya_model');
        $jam_kirim = $this->cilinaya_model->get_table('jam_kirim');
        $daerah_kirim = $this->cilinaya_model->get_table('daerah_kirim');
        $kota = $this->cilinaya_model->get_table('kota');
        $kecamatan = $this->cilinaya_model->get_table('kecamatan');
        $kecamat = $this->cilinaya_model->get_table('vw_kecamatan');
        $kelurahan = $this->cilinaya_model->get_table('kelurahan');
        $kelur = $this->cilinaya_model->get_table('vw_kelurahan');
        $data = array(
            'content' => 'pengiriman/kirim_view',
            'jam_kirim' => $jam_kirim,
            'daerah_kirim' => $daerah_kirim,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'vw_kecamatana' => $kecamat,
            'kelurahan' => $kelurahan,
            'vw_kelurahan' => $kelur
        );
        $tema = $this->cilinaya_model->get_table('tema');
        $data['tema'] = $tema;
        $this->load->view('dashboard', $data);
    }


    function tambah_jam_kirim()
    {
        $this->cilinaya_model->insert_table('jam_kirim', $this->input->post());
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Jam Pengiriman Berhasil ditambahkan</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function tambah_daerah_kirim()
    {

        $this->cilinaya_model->insert_table('daerah_kirim', $this->input->post());
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Daerah Pengiriman Berhasil ditambahkan</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function tambah_kota_kirim()
    {
        $this->cilinaya_model->insert_table('kota', $this->input->post());
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Data Kota Baru Berhasil ditambahkan</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function tambah_kec_kirim()
    {
        $this->cilinaya_model->insert_table('kecamatan', $this->input->post());
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Data Kecamatan Baru Berhasil ditambahkan</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function tambah_kel_kirim()
    {
        $this->cilinaya_model->insert_table('kelurahan', $this->input->post());
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Data Kelurahan Baru Berhasil ditambahkan</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function delete_jam_kirim($id_jam = null)
    {
        $this->cilinaya_model->delete_table('jam_kirim', array('id_jam' => $id_jam));
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Jam Pengiriman Berhasil Dihapus</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function delete_daerah_kirim($id_daerah_kirim = null)
    {
        $this->cilinaya_model->delete_table('daerah_kirim', array('id_daerah_kirim' => $id_daerah_kirim));
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Data Daerah Pengiriman Berhasil Dihapus</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function edit_jam_kirim()
    {
        $data['jam_kirim'] = $this->input->post('jam_kirim');
        $data['keterangan'] = $this->input->post('keterangan');
        $this->cilinaya_model->update_table('jam_kirim', $data, array('id_jam' => $this->input->post('id_jam')));
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Jam Pengiriman Berhasil Diperbarui</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    function edit_daerah_kirim()
    {
        $data['kota_kirim'] = $this->input->post('kota_kirim');
        $data['kec_kirim'] = $this->input->post('kec_kirim');
        $data['kel_kirim'] = $this->input->post('kel_kirim');
        $data['kurir'] = $this->input->post('kurir');
        $data['ongkir'] = $this->input->post('ongkir');
        $this->cilinaya_model->update_table('daerah_kirim', $data, array('id_daerah_kirim' => $this->input->post('id_daerah_kirim')));
        $this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Data Daerah Pengiriman Berhasil Diperbarui</strong></div>');
        redirect('pengiriman/show_pengiriman');
    }

    public function null_konten($id)
    {
        $this->load->model('cilinaya_model');
        $this->cilinaya_model->null_konten($id);
    }
}
