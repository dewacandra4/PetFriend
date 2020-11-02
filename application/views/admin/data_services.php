<?php if (validation_errors()) : ?>
  <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
  <?php endif; ?>
  <?= $this->session->flashdata('message')?>
<div class="container bg-white rounded pt-4">
    <h2 class="text-center mb-4">Services</h2>
    <div class="card-deck mb-3 mx-2 text-center">
        <?php foreach ($services as $s) : ?>
            <div class="card mb-4 shadow-sm single_service">
                <div class="card-header back-head text-dark">
                    <strong class="my-0"><?= $s->name ?></strong>
                </div> 
                <a 
                    href="javascript:;"
                    data-id="<?php echo $s->id ?>"
                    data-name="<?php echo $s->name ?>"
                    data-description="<?php echo $s->description ?>"
                    data-price="<?php echo $s->price ?>"
                    data-is_available="<?php echo $s->is_available ?>"
                    data-resource="<?php echo $s->resource ?>"
                    data-toggle="modal" data-target="#edit">           
                    <button class="btn btn-primary btn-sm glyphicon-object-align-horizontal float-right" data-toggle="modal" data-target="#ubah-data"><i class="fa fa-edit"></i> Edit</button></a>
                <div class="card-body">
                    <h4 class="card-title pricing-card-title"><small class="text-muted">Starting from<br></small><strong>RM<?= $s->price ?></strong></h4>
                    <div class="img-services">
                        <img src="<?= base_url().'/assets/services/'.$s->img ?>" class="img-fluid">
                    </div>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><?= $s->description ?></li>
                        <li>
                            <strong>Resources : <?= $s->resource?></strong>
                        </li>
                        <li> <strong>Availability: <?php if($s->is_available ==1)
                        { echo "Available";}
                        else
                        {
                            echo "Not Available";
                        }
                        ?></strong></li>
                </div>
                    </ul>
            </div>
        <?php endforeach;?>
    </div>
</div>
</div>
<?php 
    foreach($services as $ss):
        $id= $ss->id;
        $name= $ss->name;
        $description= $ss->description;
        $img= $ss->img;
        $price= $ss->price;
        $is_available = $ss->is_available;
        $resource= $ss->resource;
    ?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url().'admin/manage_services/update';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                    <label for="name">Service Name</label>
                    <input class="form-control mb-4" type="text" id="name" name="name" value="<?php echo $name;?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control rounded-0" type="text" name="description" id="description" rows="5" cols="40" ><?php echo $description;?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">RM</span>
                      </div>
                      <input type="numeric" class="form-control" name="price" id="price" value="<?= $price;?>">
                      <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Resources</label>
                    <input class="form-control mb-4" type="number" id="resource" name="resource" value="<?php echo $resource;?>">
                </div>
                <div class="form-grup">
                  <label>Images</label><br>
                  <input class="form-control mb-4"  type="file" name="img" id="img" value="<?php echo $img;?>">
                </div>
                <div class="form-grup text-center">
                    <label>Is Available?</label><br>
                    <div class="row d-flex justify-content-center">
                        Off &nbsp;
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name= "is_available" id="is_available" checked>
                            <label class="custom-control-label" for="is_available">On</label>
                        </div>                       
                    </div>
                </div>
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
<?php endforeach;?>
<!-- END Modal edit -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?= base_url()?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#name').attr("value",div.data('name'));
            modal.find('#description').html(div.data('description'));
            modal.find('#price').attr("value",div.data('price'));
            modal.find('#is_available').attr("value",div.data('is_available'));
            modal.find('#resource').attr("value",div.data('resource'));
        });
    });
</script>
</div>
