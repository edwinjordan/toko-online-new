<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("logged_in") == TRUE){
			$page=$this->uri->segment(4);
	      	$limit=100;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
							
			/*$table			= 'kategori_produk';
			$order_by		= 'id_kategori_produk';
			$d['kategori_produk']	= $this->elecomp_model->page_query($table,$order_by,$limit,$offset);*/
			$from	= 'kategori_produk';
			$join	= 'menu';
			$where	= 'kategori_produk.id_menu	=	menu.id_menu';
			$order_by	= 'kategori_produk.id_kategori_produk';
			$d['kategori_produk']	= $this->cilinaya_model->get_table_join_limit_order_by($from, $join, $where, $limit, $order_by);
			
			$config['base_url']		= base_url() . 'kategori_produk/index';
			$config['total_rows']	= $this->db->get("kategori_produk")->num_rows();
			$config['per_page']		= $limit;
			$config['uri_segment']	= 4; 
			
			$this->pagination->initialize($config);
			$d['pagination']= $this->pagination->create_links();
			
			$d['content']	= "kategori_produk/kategori_produk_view";
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
			$table	= 'kategori_produk';
			$d['kategori_produk'] = $this->cilinaya_model->get_table($table);
			
			$table	= 'menu';
			$d['menu'] = $this->cilinaya_model->get_table($table);
			
			$d['content'] = "kategori_produk/kategori_produk_add";
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
			$nama_kategori_produk 	= $this->input->post('nama_kategori_produk');
			$id_menu			 	= $this->input->post('id_menu');
			$title		= $this->input->post("title");
			$meta_description		= $this->input->post("meta_description");
			$meta_keywords		= $this->input->post("meta_keywords");
			$aktif_kategori_produk = 1;
			
			$data	= array(
				'nama_kategori_produk'		=> $nama_kategori_produk,
				'id_menu'					=> $id_menu,
				'title_kategori_produk'		=> $title,
				'meta_description_kategori_produk'		=> $meta_description,
				'meta_keywords_kategori_produk'		=> $meta_keywords,
				'aktif_kategori_produk'		=> $aktif_kategori_produk
			);
			$table	= 'kategori_produk';
				
			$this->cilinaya_model->insert_table($table,$data);
					
			redirect(base_url("kategori_produk"));  
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	
	function edit_kategori_produk($id_kategori_produk){
		if($this->session->userdata("logged_in") == TRUE){
			$table					= 'kategori_produk';
			$where					= array('id_kategori_produk' => $id_kategori_produk);
			$d['kategori_produk']	= $this->cilinaya_model->get_table_where($table, $where);
			
			$table	= 'menu';
			$d['menu'] = $this->cilinaya_model->get_table($table);
			
			$d['content'] = "kategori_produk/kategori_produk_edit";
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
	
	function edit_kategori_produk_save(){
		if($this->session->userdata("logged_in") == TRUE){
			$id_kategori_produk		= $this->input->post("id_kategori_produk");
			$nama_kategori_produk	= $this->input->post("nama_kategori_produk");
			$title		= $this->input->post("title");
			$meta_description		= $this->input->post("meta_description");
			$meta_keywords		= $this->input->post("meta_keywords");
			$id_menu				= $this->input->post("id_menu");

			$data	= array(
				'nama_kategori_produk'	=> $nama_kategori_produk,
				'id_menu'				=> $id_menu,
				'title_kategori_produk'		=> $title,
				'meta_description_kategori_produk'		=> $meta_description,
				'meta_keywords_kategori_produk'		=> $meta_keywords
			);
				
			$table	= 'kategori_produk';
			$where	= array('id_kategori_produk' => $id_kategori_produk);
				
			$this->cilinaya_model->update_table($table,$data,$where);
				
			redirect(base_url("kategori_produk"));
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}
	
	
	function edit_status($status){
			if($this->session->userdata("logged_in") == TRUE){
				$id_kategori_produk = $this->input->post("id_kategori_produk");
				
				if($status=="aktifkan"){
					$aktif_kategori_produk=1;
					
				}else if($status=="nonaktifkan"){
					$aktif_kategori_produk=0;
				}
				
				$table	= 'kategori_produk';
				$data	= array(
					'aktif_kategori_produk'	=> $aktif_kategori_produk
				);
				$where	= array(
					'id_kategori_produk'	=> $id_kategori_produk
				);
					
				$this->cilinaya_model->update_table($table, $data, $where);	
					
				redirect(base_url('kategori_produk/edit_kategori_produk/'.$id_kategori_produk));
				
					
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
