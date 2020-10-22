<h2 class="mt-4">Diagnosis</h2>
<div class="container">
	<?php echo form_open()?>
    <div class="row d-flex justify-content-center">
			<div class="col-md-10 col-md-offset-2" >
				<?php foreach($listS->result() as $value){?>
				<h3 class="text-center" ><?php echo $value->name?></h3>
                <p  class="text-center" >Choose the symptoms that are on your pet:</p>
					<?php
                    $this->load->model(array('model_symptom'));
                    $listSympt = $this->model_symptom->get_by_type($value->id);
                    foreach($listSympt->result() as $value2){?>

					<input type="checkbox" name="symptom[]" value="<?php echo $value2->id?>" > <?php echo $value2->code." - ".$value2->symptom?> <br><br>
				<?php }?>
			<?php } ?>
			</div>
		</div>
		<br>
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 text-center mb-4">
				<button type="submit" name="submit" class="btn btn-primary">Proses</button>
			</div>
		</div>
	</div>
	<?php echo form_close()?>
</div>