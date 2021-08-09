<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ongkir extends CI_Controller
{
	public function index()
	{
		$this->load->model('ongkir_model');
	}

	public function showprovince()
	{
		$this->load->model('ongkir_model');
		$province = $this->ongkir_model->showProvince();
		echo $province;
		// print_r($province['rajaongkir']['results']);
		// foreach ($province as $p) {
		// 	echo $p."<br>";
		// }
	}

	public function showcity($province)
	{
		$this->load->model('ongkir_model');
		$idprovince = $this->input->get('province');
		$city = $this->ongkir_model->showCity($idprovince);
		echo $city;
	}


	public function cost()
	{
		$this->load->model('ongkir_model');
		$origin			= $this->input->get('origin');
		$destination	= $this->input->get('destination');
		$weight			= $this->input->get('weight');
		$courier		= $this->input->get('courier');
		$id_penjual		= $this->input->get('trigger');
		$angka			= 0;
		// var_dump($origin);
		// var_dump($destination);
		// var_dump($weight);
		// var_dump($courier);
		$cost 			= $this->ongkir_model->hitungOngkir($origin, $destination, $weight, $courier);
		//parse json
		$costarray = json_decode($cost);
		if ($destination != "") {
			$results = $costarray->rajaongkir->results;
			//echo "testarray => ".$results[0]->costs[0]->service;
			if (empty($results[0]->costs[0])) {
				echo "<script>alert(\"Layanan " . strtoupper($courier) . " tidak tersedia di kota anda, silahkan pilih jasa pengiriman yang lain.\");</script>";
			}

			//echo $destination;

			# code...

			//var_dump($results);
			if (!empty($results)) :

				foreach ($results as $r) :
					$ti = 1;
					foreach ($r->costs as $rc) :
						if ($ti == 1) {
							echo "<tr><td>&nbsp</td><td>Jenis Layanan</td><td>Deskripsi</td><td>Estimasi Pengiriman</td><td>Biaya</td></tr>";
						}

						foreach ($rc->cost as $rcc) :
							echo "";

							$jn_ly = " - " . $rc->service;
?>
							<tr>

								<td><input type='radio' name='tarif' id='tarif' onClick='pilihOngkir("<?php echo $id_penjual ?>","<?php echo strtoupper($courier) . $jn_ly; ?>")' value='<?php echo $rcc->value ?>'></td>
								<td><?php echo $rc->service ?></td>
								<td><?php echo $rc->description ?></td>
								<td><?php echo $rcc->etd  ?>hari </td>
								<td>Rp. <?php echo number_format($rcc->value, 0, "", ".") ?></td>
							</tr>
<?php
							$ti++;
						endforeach;
					endforeach;
				endforeach;
			endif;
		} else {
			echo "<script>alert(\"silahkan Lengakapi info kota anda\");</script>";
		}
		//end of parse json
	}
}
