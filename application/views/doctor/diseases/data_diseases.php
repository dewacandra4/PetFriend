<div class="container mb-5">
    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
    <?php endif; ?>
    <?= $this->session->flashdata('message')?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">List of Diseases</h5>
        </div>
        <div class="card-body mb-2">
        <div class="btn btn-success mb-3" style="border-radius: 0px; font-size: 14px;" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <strong> Add Disesase</strong></div>
            <div class="table-responsive">
                <table id="disease_tb" class="table table-hover table-bordered my-3" cellspacing="0" width="100%">
                    <thead class="text-center ">  
                        <tr>
                            <th>NO</th>
                            <th>Diseases Name</th>
                            <th>Diseases Code</th>
                            <th>Early Treatment / Prevention</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($disease as $ds) :?>
                        <tr>
                            <td><?= ++$start?></td>
                            <td><?= $ds['name']?></td>
                            <td><?= $ds['code']?></td>
                            <td><?= $ds['information']?></td>
                            <td>
                                <div class="d-inline-flex p-0">
                                    <a 
                                    href="javascript:;"
                                    data-id="<?php echo $ds['id'] ?>"
                                    data-name="<?php echo $ds['name'] ?>"
                                    data-code="<?php echo $ds['code']?>"
                                    data-information="<?php echo $ds['information']?>"
                                    data-toggle="modal" data-target="#edit">
                                    <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-edit"></i></button></a>
                                    <a 
                                    href="javascript:;"
                                    data-id="<?php echo $ds['id'] ?>"
                                    data-name="<?php echo $ds['name'] ?>"
                                    data-code="<?php echo $ds['code']?>"
                                    data-information="<?php echo $ds['information']?>"
                                    data-toggle="modal" data-target="#delete">
                                    <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-trash"></i></button></a>
                                
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
            <h5><strong>Add Disease</strong></h5>
        </div>   
            <form action="<?= base_url().'doctor/manage_diseases/add_action';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Disease's Code</label>
                    <input class="form-control mb-4" type="text" id="code" name="code" placeholder="e.g. D00X" value="<?=set_value('code');?>">
                </div>
                <div class="form-group">
                    <label for="name">Disease's Name</label>
                    <input class="form-control mb-4" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="name">Information</label>
                    <textarea class="form-control rounded-0" type="text" name="information" id="information" rows="5" cols="40"></textarea>
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
    foreach($disease as $d):
        $id= $d['id'];
        $code= $d['code'];
        $name= ($d['name']);
        $information= ($d['information']);
        
?>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <div class="modal-content">
        <div class="modal-header text-white  d-flex justify-content-center bg-primary"> 
            <h5><strong>Edit Disease</strong></h5>
        </div>   
            <form action="<?= base_url().'doctor/manage_diseases/edit';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $d['id'];?>">
                    <label for="name">Disease's Code</label>
                    <input class="form-control mb-4" type="text" id="code" name="code" value="<?=$d['code']?>" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Disease's Name</label>
                    <input class="form-control mb-4" type="text" id="name" name="name" value="<?=$d['name']?>">
                </div>
                <div class="form-group">
                    <label for="name">Information</label>
                    <textarea class="form-control rounded-0" type="text" name="information" id="information" rows="5" cols="40"><?php echo($information);?></textarea>
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
    foreach($disease as $dis):
        $id= $dis['id'];
        $name = $dis['name'];
        $code = $dis['code'];
?>

<!--Modal: Remove-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <p class="heading"><strong>Delete Disease</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-trash fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('doctor/manage_diseases/delete/');?>" method="post">
                            <p>Do you want to delete this disease #<strong id="name"><?php echo $name;?></strong>?</p>
                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>"> 
                            <input type="hidden" id="code" name="code" value="<?php echo $code;?>"> 
                            <input type="hidden" id="name" name="name" value="<?php echo $name;?>"> 
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
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#code').attr("value",div.data('code'));
            modal.find('#name').html(div.data('name'));
            modal.find('#name').attr("value",div.data('name'));
            modal.find('#information').html(div.data('information'));
            
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
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#code').attr("value",div.data('code'));
            modal.find('#name').html(div.data('name'));
            modal.find('#name').attr("value",div.data('name'));
            
        });
    });
</script>