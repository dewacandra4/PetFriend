<style>
	
.checklabel {
	display: block;
	position: relative;
	padding-left: 35px;
	margin-bottom: 12px;
	cursor: pointer;
	font-size: 15px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

/* Hide the browser's default checkbox */
.checklabel input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
	height: 0;
	width: 0;
}

/* Create a custom checkbox */
.checkmark {
	position: absolute;
	top: 0;
	left: 0;
	height: 25px;
	width: 25px;
	background-color: #eee;
}

/* On mouse-over, add a grey background color */
.checklabel:hover input ~ .checkmark {
	background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checklabel input:checked ~ .checkmark {
	background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
	content: "";
	position: absolute;
	display: none;
}

/* Show the checkmark when checked */
.checklabel input:checked ~ .checkmark:after {
	display: block;
}

/* Style the checkmark/indicator */
.checklabel .checkmark:after {
	left: 9px;
	top: 5px;
	width: 5px;
	height: 10px;
	border: solid white;
	border-width: 0 3px 3px 0;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
}
.dataTables_scrollBody
{
	overflow-x:hidden !important;
	overflow-y:auto !important;
}
.table{
	table-layout:fixed;
	width: 98% !important; 
}
.dataTables_wrapper .dataTables_filter {
  width:100%;
  text-align:center;
}

input[type=search] {
  width: 300px;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
<h2 class="mt-4">Diagnosis</h2>
<div class="container">
	<?php echo form_open()?>
    	<!-- <div class="row d-flex justify-content-center">
			<div class="col-md-10 col-md-offset-2" > -->
			<div class="container-fluid">
				<?php foreach($listS->result() as $value){?>
					<h3 class="text-center"><?php echo $value->name?></h3>
					<p class="text-center" >Choose the symptoms that are on your pet:</p>
					<?= $this->session->flashdata('message')?>
					<div class="table-responsive">
						<table id="listSympt" class="table table-hover my-3" cellspacing="0" width="100%">
							<thead class="text-center ">
								
								<th class="text-center" style="table-layout:fixed; width: 80% !important; ">Select Symptoms</th>
							</thead>
							<tbody>
									<?php
										$this->load->model(array('model_symptom'));
										$listSympt = $this->model_symptom->get_by_type($value->id);
										foreach($listSympt->result() as $value2){?>
										<tr>
											<td>
												<label class="checklabel text-dark font-weight-bold"><?php echo $value2->code;?> - <?=$value2->symptom?>
												<input type="checkbox" class="form-check-input ml-4" name="symptom[]" value="<?php echo $value2->symptom_id ?>">
												<span class="checkmark"></span>
												</label>
											</td>
										</tr>
									<?php }?>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
			<!-- </div>
		</div> -->
		<br>
		<div class="row d-flex justify-content-center">
			<div class="col-md-10 text-center mb-4">
				<button type="submit" name="submit" class="btn btn-primary">Process</button>
			</div>
		</div>
	</div>

	<?php echo form_close()?>
</div>

