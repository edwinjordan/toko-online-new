<div class="panel-body table-responsive">
	<h2>Pembelajaran Apriori</h2>
    <!-- <a href="<?php echo site_url('apriori/runengine');?>" class="btn btn-danger">Pelajari Sekarang</a> -->
    <?php if (isset($done)){
    	if ($done == "ok"){?>
		<h5 style="color:red;">Sudah terpelajari.</h5>
    <?php } else { ?>
    	<h5 style="color:red;">Max Confident is 1.</h5>
    	<?php }} ?>
    <form method=POST action="<?php echo base_url() . 'apriori/runengine' ?>" enctype="multipart/form-data">
      	<table class='table table-hover'>
          	<tbody>
	          <tr>
	          	<td class='left'>Support</td>      
	          	<td>*default 2<input class="form-control" style="width:70px" name='supp' value=2 size=70></td>
	          </tr>
        
			  <tr>
	          	<td class='left'>Confident</td>      
	          	<td>*default 0.5 (0 - 1)<input class="form-control" style="width:70px" value=0.5 name='conf' size=70></td>
	          </tr>
          </tbody>
      	</table>
      	<input type="submit" value="Simpan" class="btn btn-success">
     </form>
</div>
