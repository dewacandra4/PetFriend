<div class="container-fluid">
  <?php if (validation_errors()) : ?>
  <div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
  <?php endif; ?>
  <?= $this->session->flashdata('message')?>
    <div class="card shadow px-0 mb-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-center text-dark">Product List</h5>
        </div>
        <div class="card-body">
          <button class ="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#modalProduct"><i class="fas fa-plus fa-sm"></i> Add Products</button>
          <div class="table-responsive">
            <table id="selectedColumn" class="table table-hover table-bordered " cellspacing="0" width="100%">
              <thead>  
                <tr>
                    <th class="th-lg">No</th>
                    <th class="th-lg">Product Name</th>
                    <th class="th-lg">Description</th>
                    <th class="th-lg">Category</th>
                    <th class="th-lg">Image Name</th>
                    <th class="th-lg">Price</th>
                    <th class="th-lg">Stocks</th>
                    <th class="th-lg">Action</th>
                    
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($barang as $product) {?>
                <tr>
                    <td><?= ++$start?></td>
                    <td><?= $product['name']?></td>
                    <td><?= $product['description']?></td>
                    <td><?= $product['category']?></td>
                    <td><?= $product['img']?></td>
                    <td>RM<?= $product['price']?></td>
                    <td><?= $product['stock']?></td>
                    <td>
                    <div class="text-center">
                      <div class="d-inline-flex p-0">
                        <?= anchor('home/detail_product/'.$product['id'],'<div class="btn btn-success btn-sm glyphicon-object-align-horizontal"><i class="fas fa-search-plus"></i></div>')?>
                        <a 
                          href="javascript:;"
                          data-id="<?php echo $product['id'] ?>"
                          data-name="<?php echo $product['name'] ?>"
                          data-description="<?php echo $product['description'] ?>"
                          data-category="<?php echo $product['category'] ?>"
                          data-category_id="<?php echo $product['category_id'] ?>"
                          data-price="<?php echo $product['price'] ?>"
                          data-stock="<?php echo $product['stock'] ?>"
                          data-toggle="modal" data-target="#edit">
                        <button class="btn btn-primary btn-sm glyphicon-object-align-horizontal" data-toggle="modal" data-target="#ubah-data"><i class="fa fa-edit"></i></button>
                        <a 
                          href="javascript:;"
                          data-id="<?php echo $product['id'] ?>"
                          data-name="<?php echo $product['name'] ?>"
                          data-toggle="modal" data-target="#delete">
                          <button class="btn btn-danger btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fa fa-trash"></i></button></a>
                      </div>
                    </div>
                    </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProductLabel">FORM ADD PRODUCTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url().'admin/manage_products/add_action';?>" method="post" enctype="multipart/form-data">
            <div class="form-grup">
                <label>Product Name</label>
                <input class="form-control mb-4" type="text" name="name" class="form-control">
            </div>
            <div class="form-grup">
                <label>Category</label>
                <select class="browser-default custom-select mb-4" id="category_id" name="category_id" >
                    <option value="" disabled selected>Choose Category Product</option>
                    <option value="1"  >Cat</option>
                    <option value="2" >Dog</option>
                    <option value="3">Birds</option>
                    <option value="4">Small Pets</option>
                </select>
            </div>
            <div class="form-grup">
                <label>Description</label>
                <input class="form-control mb-4" type="text" name="description" class="form-control">
            </div>
            <div class="form-grup">
                <label>Price</label>
                <input class="form-control mb-4" type="text" name="price" class="form-control">
            </div>
            <div class="form-grup">
                <label>Stocks</label>
                <input class="form-control mb-4" type="text" name="stock" class="form-control">
            </div>
            <div class="form-grup">
                <label>Images</label><br>
                <input class="form-control mb-4"  type="file" name="img" id="img" class="form-control">               
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<?php 
    foreach($barang as $product):
        $id= ($product['id']);
        $name= ($product['name']);
        $description= ($product['description']);
        $img= ($product['img']);
        $category=($product['category']);
        $category_id=$product['category_id'];
        $price= ($product['price']);
        $stock= ($product['stock']);
        
    ?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal">Edit Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url().'admin/manage_products/update';?>" method="post"  enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                    <label for="name">Product Name</label>
                    <input class="form-control mb-4" type="text" id="name" name="name" value="<?php echo $name;?>">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control rounded-0" type="text" name="description" id="description" rows="5" cols="40"><?php echo($description);?></textarea>
                </div>
                <div class="form-group">
                <label for="category">Category</label>
                  <select class="browser-default custom-select mb-4" id="category_id" name="category_id">
                    <option value="" disabled selected>Choose option</option>
                    <option value="1">Cat</option>
                    <option value="2">Dog</option>
                    <option value="3">Birds</option>
                    <option value="4">Small Pets</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
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
                    <label for="name">Stocks</label>
                    <input class="form-control mb-4" type="number" id="stock" name="stock" value="<?php echo $stock;?>">
                </div>
                <div class="form-grup">
                  <label>Images</label><br>
                  <input class="form-control mb-4"  type="file" name="img" id="img" value="<?php echo $img;?>">               
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


<?php 
    foreach($barang as $pro):
        $id= $pro['id'];
        $name = $pro['name'];
?>


<!--Modal: modalPush-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-danger">
                <p class="heading"><strong>Delete Product</strong></p>
            </div>

        <!--Body-->
            <div class="modal-body">

                <i class="fa fa-trash fa-5x text-danger animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/manage_products/delete/');?>" method="post">
                            <p>Do you want to delete this product #<strong id="name"><?php echo $name;?></strong>?</p>
                            <input type="hidden" id="id" name="id" value="<?php echo $id;?>"> 
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
            modal.find('#category_id').attr("value",div.data('category_id'));
            modal.find('#category').attr("value",div.data('category'));
            modal.find('#img').attr("value",div.data('img'));
            modal.find('#price').attr("value",div.data('price'));
            modal.find('#stock').attr("value",div.data('stock'));
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
            modal.find('#name').html(div.data('name'));
        });
    });
</script>
</div>
