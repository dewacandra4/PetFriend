<div class="container mb-5">
    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
    <?php endif; ?>
    <?php echo $this->session->flashdata('message')?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">List of Symptoms</h5>
        </div>
        <div class="card-body mb-2">
        <div class="btn btn-success mb-3" style="border-radius: 0px; font-size: 14px;" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <strong> Add Symptom</strong></div>
        <div class="table-responsive">
            <table id="symptom_tb" class="table table-hover table-bordered my-3" cellspacing="0" width="100%">
                <thead class="text-center ">  
                    <tr>
                        <th>NO</th>
                        <th>Symptoms Code</th>
                        <th>Pet Type</th>
                        <th>Symptoms</th>
                        <th>Action</th>
                    </tr>
                </thead>  
                <tbody>
                    <?php
                    foreach($symptoms as $sp) :?>
                    <tr>
                        <td><?= ++$start?></td>
                        <td><?= $sp['code']?></td>
                        <td><?= $sp['name']?></td>     
                        <td><?= $sp['symptom']?></td>
                        <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                    <a 
                                    href="javascript:;"
                                    data-symptom_id="<?php echo $sp['symptom_id'] ?>"
                                    data-type_id="<?php echo $sp['type_id'] ?>"
                                    data-code="<?php echo $sp['code']?>"
                                    data-symptom="<?php echo $sp['symptom']?>"
                                    data-toggle="modal" data-target="#edit">
                                    <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-edit"></i></button></a>

                                    <a 
                                    href="javascript:;"
                                    data-symptom_id="<?php echo $sp['symptom_id'] ?>"
                                    data-symptom="<?php echo $sp['symptom'] ?>"
                                    data-code="<?php echo $sp['code']?>"
                                    data-toggle="modal" data-target="#delete">
                                    <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-trash"></i></button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info " role="document">
    <div class="modal-content">
        <div class="modal-header text-white  d-flex justify-content-center bg-success"> 
            <h5><strong>Add Symptom</strong></h5>
        </div>   
            <form action="<?= base_url().'doctor/manage_sympt/add_action';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Symptom's Code</label>
                    <input class="form-control mb-4" type="text" id="code" name="code" placeholder="e.g. S00X" value="<?=set_value('code');?>">
                </div>
                <div class="form-group">
                    <label>Pet Type</label>
                    <select class="form-control" name="type_id">
                        <option value='1'>Dog (1)</option>
                        <option value='2'>Cat (2)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Symptom</label>
                    <input class="form-control mb-4" type="text" id="symptom" name="symptom">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit"> Save&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<!-- End Modal add -->


<?php 
    foreach($symptoms as $d):
        $symptom_id= $d['symptom_id'];
        $code= $d['code'];
        $symptom= ($d['symptom']);
        $type_id= ($d['type_id']);
        
?>
<script>
    $(document).ready(function() {
            // Untuk sunting
            $('#edit').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                var modal          = $(this)
    
                // Isi nilai pada field
                modal.find('#symptom_id').attr("value",div.data('symptom_id'));
                modal.find('#code').attr("value",div.data('code'));
                modal.find('#symptom').html(div.data('symptom'));
                modal.find('#symptom').attr("value",div.data('symptom'));
                modal.find('#type_id').attr("value",div.data('type_id'));
                var type_id= document.getElementById('type_id');
                type_id.value = div.data('type_id');
                
            });
        });
</script>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <div class="modal-content">
        <div class="modal-header text-white  d-flex justify-content-center bg-primary"> 
            <h5><strong>Edit symptoms</strong></h5>
        </div>   
            <form action="<?= base_url().'doctor/manage_sympt/edit';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="symptom_id" name="symptom_id" value="<?php echo $d['symptom_id'];?>">
                    <label for="name">Symptoms's Code</label>
                    <input class="form-control mb-4" type="text" id="code" name="code" value="<?=$d['code']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Symptoms</label>
                    <input class="form-control mb-4" type="text" id="symptom" name="symptom" value="<?=$d['symptom']?>">
                </div>
                <div class="form-group">
                    <label>Pet Type</label>
                    <select class="form-control" id="type_id" name="type_id" value="">
                        <option value="1">Dog</option>
                        <option value="2">Cat</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"> Save&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                </div>
                </div>
            </form>
        </div>
      </div>
    </div>
<!-- End Modal Edit -->
<?php endforeach;?>

<?php 
    foreach($symptoms as $sy):
        $symptom_id= $d['symptom_id'];
        $code= $d['code'];
        $symptom= ($d['symptom']);
?>

<!--Modal: Remove-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <p class="heading"><strong>Delete Symptom</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-trash fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('doctor/manage_sympt/delete/');?>" method="post">
                            <p>Do you want to delete this symptom #<strong id="symptom"><?php echo $symptom;?></strong>?</p>
                            <input type="hidden" id="symptom_id" name="symptom_id" value="<?php echo $symptom_id;?>"> 
                            <input type="hidden" id="code" name="code" value="<?php echo $code;?>"> 
                            <input type="hidden" id="symptom" name="symptom" value="<?php echo $symptom;?>"> 
                    </div>
                </div>
            
            <hr/>
            <!--Footer-->
            <div class="text-center">
                <button class="btn btn-danger" type="submit"> Yes&nbsp;</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
            </div>
          </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>

<?php endforeach;?>
<!-- END Modal Remove -->

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#symptom_id').attr("value",div.data('symptom_id'));
            modal.find('#code').attr("value",div.data('code'));
            modal.find('#symptom').html(div.data('symptom'));
            modal.find('#symptom').attr("value",div.data('symptom'));
            modal.find('#type_id').attr("value",div.data('type_id'));
            
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#delete').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#symptom_id').attr("value",div.data('symptom_id'));
            modal.find('#code').attr("value",div.data('code'));
            modal.find('#symptom').html(div.data('symptom'));
            modal.find('#symptom').attr("value",div.data('symptom'));
            
        });
    });
</script>