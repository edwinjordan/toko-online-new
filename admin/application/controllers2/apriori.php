<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apriori extends CI_Controller {
	public function index()
	{
		$d['content'] = "apriori";
		$this->load->view('dashboard',$d);
	}

	public function runEngine()
	{
		if ($this->input->post('conf') < 1){
		////////////////////////////////////////////////////////////////
		date_default_timezone_set('Asia/Jakarta');			
		$tgl_now = date('Y-m-d');
		$tgl_past = date('Y-m-d', strtotime("-8 month"));
		//var_dump($tgl_past); tgl_order BETWEEN '$tgl_past' AND '$tgl_now
		
		$this->db->query("TRUNCATE TABLE apriori");

		$sql_produk = "SELECT `id_order` from `order` where tgl_order BETWEEN '$tgl_past' AND '$tgl_now'";
		$promonth = $this->db->query($sql_produk)->result_array();

		$inMonth="";
		foreach ($promonth as $key) {
			if ($inMonth == "") {
				$inMonth = '\''.$key['id_order'].'\'';
			}
			else{
				$inMonth = $inMonth.',\''.$key['id_order'].'\'';
			}
		}

		$brg_sql = "SELECT DISTINCT id_produk, count(id_produk) as jml from detail_order where id_order IN(".$inMonth.") group by id_produk having count(id_produk)>1";
		$brg = $this->db->query($brg_sql)->result_array();

		//var_dump($brg);
		    
		$sql = "SELECT GROUP_CONCAT(id_produk SEPARATOR ',') as barang FROM detail_order where id_order IN(".$inMonth.") group by id_order having count(barang)>1";
		$hasil = $this->db->query($sql)->result_array();

		//var_dump($hasil);

		$detail = [];
		
		foreach ($hasil as $key) {
			array_push($detail, $key["barang"]);
		}

		//var_dump($detail);
 
	    $produk=[];
	    $total_produk=[];
	    $gabung=[];

	    $support = ($this->input->post('supp') != 0 ? $this->input->post('supp') : 2 );
	    $confident = ($this->input->post('conf') != 0 ? $this->input->post('conf') : 0.5 );
		//     echo "<br>Frekuensi Item<br>";
  

		for ($i=0; $i<count($brg); $i++) {
			if($brg[$i]['jml'] >= $support){
		    	//echo $brg[$i]['id_produk'].' => '.$brg[$i]['jml'].'<br>';
		    	array_push($produk, $brg[$i]['id_produk']);
		        array_push($total_produk, $brg[$i]['jml']);
		        $gabung[$brg[$i]['id_produk']] = $brg[$i]['jml'];
	    	}
	    }    
    	$item_array = [];
		// MENDAPAT JUMLAH GABUNGAN

		for($i = 0; $i < count($brg)-1; $i++){
		    for($j = $i+1; $j < count($brg); $j++) {
		        $item_pair = $brg[$i]['id_produk'].'-'.$brg[$j]['id_produk']; 
		        $item_array[$item_pair] = 0;
		        foreach($detail as $item_belian) {
		            $exp = explode(",", $item_belian);
		            if((in_array($brg[$i]['id_produk'], $exp)) && (in_array($brg[$j]['id_produk'], $exp))){
		                $item_array[$item_pair]++;
		            }
		        }
		    }
		}    
		$rekom = "";
	    foreach ($item_array as $ia_key => $ia_value) {
	        $theitems = explode('-',$ia_key);
	        //var_dump($theitems);
	        $item_name = $theitems[0];
	        $item_total = $gabung[$item_name];
	        $in_float = $ia_value / $item_total;
	        $in_percent = round($in_float * 100, 2);
	        $alt_item = $theitems[ (1) % count($theitems)];
	        if($in_float >= $confident){
	        	$this->db->query("INSERT INTO apriori  VALUES( NULL, $item_name, $alt_item, $in_float)");
	        }
	    }
	    $d['done'] = "ok";
	    $d['content'] = "apriori";
		$this->load->view('dashboard',$d);
		} else {
			$d['done'] = "nope";
		    $d['content'] = "apriori";
			$this->load->view('dashboard',$d);
		} 
	}
}
