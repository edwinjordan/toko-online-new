<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Testimonial extends CI_Controller {
		public function index(){
			if($this->session->userdata("logged_in") == TRUE){
				$page=$this->uri->segment(4);
		      		$limit=10;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$d['testimonial_list'] = $this->cilinaya_model->page_query("testimonial",$limit,$offset)->result_array();
				
				$config['base_url'] = base_url() . 'testimonial/index/';
				$config['total_rows'] = $this->db->get("testimonial")->num_rows();
				$config['per_page']   = $limit;
				$config['uri_segment'] = 4; 
				
				$this->pagination->initialize($config);
				$d['pagination']=$this->pagination->create_links();
				
				$d['content'] = "testimonial/testimonial_view";
				$this->load->view('dashboard',$d);
			} else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
		
		public function add(){
			if($this->session->userdata("logged_in") == TRUE){
				$d['content'] = "testimonial/testimonial_add";
				$this->load->view('dashboard',$d);
			}else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
		
		public function edit_testimonial($id){
			if($this->session->userdata("logged_in") == TRUE){
				$d['edit_testimonial'] = $this->db->query("SELECT * FROM testimonial WHERE id_testimonial='$id'");
				$d['content'] = "testimonial/testimonial_edit";
				$this->load->view('dashboard',$d);
			}else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
		
		public function save(){
			if($this->session->userdata("logged_in") == TRUE){
				$pengirim = preg_replace('/\s+/', '', $this->input->post('pengirim'));
				$isi = $this->input->post('isi');
				
				$config['file_name'] = $pengirim;
				$config['upload_path'] = 'img_foto/testimonial/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());
					
        				redirect(base_url("testimonial"));  
				}else{
				    	$get_name = $this->upload->data();
			   		$nama_foto = $get_name['file_name'];
				    	$this->db->query("INSERT INTO testimonial(pengirim_testimonial, deskripsi_testimonial, foto_testimonial) 
												VALUES('$pengirim', '$isi', '$nama_foto ')");
        				redirect(base_url("testimonial"));  
				}
			}else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
		
		public function edit(){
			if($this->session->userdata("logged_in") == TRUE){
				
				$id = $this->input->post('id');
				$pengirim = preg_replace('/\s+/', '', $this->input->post('pengirim'));
				$isi = $this->input->post('isi');
				
				$config['file_name'] = $pengirim;
				$config['upload_path'] = 'img_foto/testimonial/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());
		
					//var_dump($error);
					redirect(base_url("testimonial/edit_testimonial/".$id));
				} else {
					$data = $this->upload->data();
					$new_name=$data['file_name'];
		
					$this->db->query("UPDATE testimonial SET pengirim_testimonial = '$pengirim', deskripsi_testimonial = '$isi', 
							foto_testimonial = '".$data['file_name']."' WHERE id_testimonial = '$id'") or die(mysql_error());
		        			redirect(base_url("testimonial"));
				}			
				
			}else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
		
		public function hapus(){
			if($this->session->userdata("logged_in") == TRUE){
				$id = $this->input->post("id");
				$namafile = $this->input->post("foto_testimonial");
				$d['hapus_testimonial'] = $this->db->query("DELETE FROM testimonial WHERE id_testimonial='$id'");
				
				$path = realpath(APPPATH . '../img_foto/testimonial');
				$hapus =  $path."/".$namafile;
				
				@unlink($hapus);
				
				redirect(base_url("testimonial"));
			}else{
				$url = base_url("");
				$msg = "Maaf Anda Belum Login.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
			}
		}
	}
?>