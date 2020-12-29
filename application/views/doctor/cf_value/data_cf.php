<div class="container mb-5">
    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
    <?php endif; ?>
    <?php echo $this->session->flashdata('message')?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">List of CF Value</h5>
        </div>
        <div class="card-body mb-2">
        <div class="btn btn-success mb-3" style="border-radius: 0px; font-size: 14px;" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i><strong>Add CF Value</strong></div>
            <div class="table-responsive">
                <table id="cf_tb" class="table table-hover table-bordered my-3" cellspacing="0" width="100%">
                    <thead class="text-center ">
                        <tr>
                            <th>NO</th>
                            <th>CF ID</th>
                            <!-- <th>Symptom ID</th> -->
                            <th>Symptoms</th>
                            <!-- <th>Disease ID</th> -->
                            <th>Disease</th>
                            <th>MB Value</th>
                            <th>MD Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($cf as $data): ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?= $data['id_cf']?></td>
                            <!-- <td><?= $data['symptom_id']?></td> -->
                            <td><?php echo $data['symptom'] ?></td>
                            <!-- <td><?php echo $data['disease_id']?></td> -->
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['mb'] ?></td>
                            <td><?php echo $data['md'] ?></td>
                            <td>
                                <div class="d-inline-flex p-0">
                                    <a 
                                    href="javascript:;"
                                    data-id_cf="<?php echo $data['id_cf'] ?>"
                                    data-symptom_id="<?php echo $data['symptom_id'] ?>"
                                    data-disease_id="<?php echo $data['disease_id'] ?>"
                                    data-symptom="<?php echo $data['symptom'] ?>"
                                    data-name="<?php echo $data['name'] ?>"
                                    data-mb="<?php echo $data['mb']?>"
                                    data-md="<?php echo $data['md']?>"
                                    data-toggle="modal" data-target="#edit">
                                    <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-edit"></i></button></a>

                                    <a 
                                    href="javascript:;"
                                    data-id_cf="<?php echo $data['id_cf'] ?>"
                                    data-toggle="modal" data-target="#delete">
                                    <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
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
                <h5><strong>Add CF Value</strong></h5>
            </div>   
                <form action="<?= base_url().'doctor/manage_cf/add_action';?>" method="post"  enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Symptoms</label>
                            <select name="symptom" id="symptom" class="form-control">
                                <option value="">-Select-</option>
                                <?php $symptoms_list = $this->model_cf->getSympt();
                                ?>
                                <?php foreach ($symptoms_list->result() as $key){ ?>
                                    <option value="<?php echo $key->symptom_id ?>"><?php echo $key->symptom; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="disease">Disease's Name</label>
                            <select name="disease" id="disease" class="form-control " >
                                <option value="">-Select-</option>
                                <?php $disease_list = $this->model_cf->getDiseases();
                                ?>
                                <?php foreach ($disease_list->result() as $key){ ?>
                                    <option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
                                <?php } ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mb">MB Value (Measure of Belief)</label>
                            <input type="text" name="mb" id="mb" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="md">MD Value (Measure of Disbelief)</label>
                            <input type="text" name="md" id="md" class="form-control" required="required">
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
</div>
</div>
<!-- End Modal add -->

<?php 
    foreach($cf as $c):
        $id= $c['id_cf'];
        $symptom_id =  $c['symptom_id'];
        $symptom= $c['symptom'];
        $name= ($c['name']);
        $mb= ($c['mb']);
        $md= ($c['md']);
    
?>

<script>
$(document).ready(function() {
        // Untuk sunting
        $('#edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_cf').attr("value",div.data('id_cf'));
            modal.find('#code').attr("value",div.data('code'));
            modal.find('#symptom_id').attr("value",div.data('symptom_id'));
            modal.find('#mb').attr("value",div.data('mb'));
            modal.find('#md').attr("value",div.data('md'));
            var symptom_id= document.getElementById('symptom_id');
            symptom_id.value = div.data('symptom_id');
            var disease_id= document.getElementById('disease_id');
            disease_id.value = div.data('disease_id');
            
        });
    });
</script>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <div class="modal-content">
        <div class="modal-header text-white  d-flex justify-content-center bg-primary"> 
            <h5><strong>Edit CF Value</strong></h5>
        </div>   
            <form action="<?= base_url().'doctor/manage_cf/edit';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id_cf" name="id" value="<?php echo $c['id_cf'];?>">
                    <label for="name">Symptom</label>
                    <select id="symptom_id" name="symptom_id" class="form-control" value="" >
                    <option value="">-Select-</option>
                        <?php
                        // $query = $this->db->query("SELECT *, a.id_cf as cid FROM cf a JOIN diseases b ON b.id = a.disease_id WHERE a.id_cf='$id' ")->row_array();
                            foreach ($symptoms as $s) {
                                echo " <option value='$s->symptom_id'";
                                // echo $cf_id['symptom_id']==$s->id?'selected':'' ;
                                echo ">$s->symptom</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="disease">Disease's Name</label>
                    <select id="disease_id" name="disease_id" class="form-control" value="" >
                    <option value="">-Select-</option>
                    <?php
                    // $query = $this->db->query("SELECT *, a.id_cf as cid FROM cf a JOIN diseases b ON b.id = a.disease_id WHERE a.id_cf='$id' ")->row_array();
                        foreach ($diseases as $dise) {
                            echo " <option value='$dise->id'";
                            // echo $cf_id['symptom_id']==$dise->id?'selected':'' ;
                            echo ">$dise->name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mb">MB Value (Measure of Belief)</label>
                    <input type="text" name="mb" id="mb" class="form-control" value="<?= $mb;?>" required="required">
                </div>
                <div class="form-group">
                    <label for="md">MD Value (Measure of Disbelief)</label>
                    <input type="text" name="md" id="md" class="form-control" value="<?= $mb;?>" required="required">
                </div>
                <!-- <div class="form-group">
                    <label for="name">Disease's Name</label>
                    <input class="form-control mb-4" type="text" id="name" name="name" value="<?=$d['name']?>">
                </div>
                <div class="form-group">
                    <label for="name">Information</label>
                    <textarea class="form-control rounded-0" type="text" name="information" id="information" rows="5" cols="40"><?php echo($information);?></textarea>
                </div> -->
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit"> Save&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- End Modal Edit -->
<?php endforeach;?>


<?php 
    foreach($cf as $data_cf):
        $id_cf= $data_cf['id_cf'];
?>

<!--Modal: Remove-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <p class="heading"><strong>Delete CF Value</strong></p>
            </div>

            <!--Body-->
            <div class="modal-body">

                <i class="fa fa-trash fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('doctor/manage_cf/delete/');?>" method="post">
                            <p>Do you want to delete this CF Value (ID <strong id="id_cf">#<?php echo $id_cf;?></strong>) ?</p>
                            <input type="hidden" id="id_cf" name="id_cf" value="<?php echo $id_cf;?>"> 
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
        $('#delete').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#id_cf').attr("value",div.data('id_cf'));
            modal.find('#id_cf').html(div.data('id_cf'));
            
        });
    });
</script>