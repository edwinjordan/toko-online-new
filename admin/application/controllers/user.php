<?php
class user extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata("admin_username") != "") {
            $data['user'] = $this->cilinaya_model->get_table('admin');
            $data['content'] = "user/view";
            $tema = $this->cilinaya_model->get_table('tema');
            $data['tema'] = $tema;
            $this->load->view('dashboard', $data);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
                alert("' . $msg . '"); 
                location.href = "' . $desk . '"; 
                </script>';
        }
    }

    public function edit_user($id)
    {
        $id_admin = array('id_admin' => $id);
        $data['user'] = $this->cilinaya_model->getWhere('admin', $id_admin);
        $data['content'] = "user/edit";
        $tema = $this->cilinaya_model->get_table('tema');
        $data['tema'] = $tema;
        $this->load->view('dashboard', $data);
    }

    public function edit_user_data()
    {
        $id_admin = $this->input->post('id');
        $username = $this->input->post('nama');
        $pass = $this->input->post('pass');

        $data = array(
            'admin_username' => $username,
            'admin_password' => md5($pass),
            'admin_view_password' => $pass
        );
        $this->cilinaya_model->update('admin', array('id_admin' => $id_admin), $data);

        redirect('user');
    }
}
