<?php
class Slider extends CI_Controller{
	function index(){
		if($this->session->userdata("logged_in") == TRUE){
			$page=$this->uri->segment(4);
	      	$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
			
			$d['slider'] = $this->cilinaya_model->page_query("slider",$limit,$offset)->result_array();
			
			$config['base_url'] = base_url() . 'slider/index/';
			$config['total_rows'] = $this->db->get("slider")->num_rows();
			$config['per_page']   = $limit;
			$config['uri_segment'] = 4; 
			
			$this->pagination->initialize($config);
			$d['pagination']=$this->pagination->create_links();
			
			$d['content'] = "slider/slider_view";
			$this->load->view('dashboard',$d);
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function add(){
		if($this->session->userdata("logged_in") == TRUE){
			$d['content'] = "slider/slider_add";
			$this->load->view('dashboard',$d);
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function save(){
		if($this->session->userdata("logged_in") == TRUE){
			$judul 		= $this->input->post('judul_slider');
            $isi	= $this->input->post('isi_slider');
			$this->db->query("
				INSERT INTO slider(judul, isi) 
							  VALUES('$judul','$isi')");
			redirect(base_url("slider"));  
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
		
		
	}
	function edit_slider($id){
		if($this->session->userdata("logged_in") == TRUE){
			$d['edit_slider'] = $this->db->query("SELECT * FROM slider WHERE id_slider='$id'");
			$d['content'] = "slider/slider_edit";
			$this->load->view('dashboard',$d);
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function edit(){
		if($this->session->userdata("logged_in") == TRUE){
			$id = $this->input->post('id');
			$judul 		= $this->input->post('judul_slider');
            $isi	= $this->input->post('isi_slider');
           
			$this->db->query("
				 UPDATE slider SET 
				 judul      = '$judul',
				 isi		  = '$isi'
				 WHERE id_slider  = '$id'");
			redirect(base_url("slider"));
			
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function hapus($id){
		if($this->session->userdata("logged_in") == TRUE){
			$sqlSlider = $this->db->query("select * from slider where id_slider='$id'");
			$getSlider = $sqlSlider->result();
			$path = realpath(APPPATH . '../img_foto/slider');
			unlink($path."/".$getSlider[0]->gambar);
			$d['hapus_slider'] = $this->db->query("DELETE FROM slider WHERE id_slider='$id'");
			redirect(base_url("slider"));
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function foto($id){
		if($this->session->userdata("logged_in") == TRUE){
			$d['detail_slider'] 	= $this->db->query("SELECT * FROM slider WHERE id_slider='$id'");
			$d['id_slider'] 		= $id;
			$d['content'] 			= "slider/slider_foto";
			$this->load->view('dashboard',$d);
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	function foto_save(){
		if($this->session->userdata("logged_in") == TRUE){
			$id	= $this->input->post("id");
			$config['upload_path'] 	= './img_foto/slider/';
			$config['allowed_types']	= 'jpg|jpeg|png';
			$config['max_size']		= 2000;
			$config['file_name'] 	= $this->input->post('userfile');;

			$this->load->library("upload");
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				echo $this->upload->display_errors(); die;
			}
			else
			{
				$upload = $this->upload->data();
				$gambar = $upload["file_name"];
				$sqlSlider = $this->db->query("select * from slider where id_slider='$id'");
				$getSlider = $sqlSlider->result();
				$path = realpath(APPPATH . '../img_foto/slider');
				unlink($path."/".$getSlider[0]->gambar);
				$this->db->query("UPDATE slider SET gambar='$gambar' WHERE id_slider='$id'");
        		redirect(base_url("slider/foto/$id"));
			}
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
}
?>