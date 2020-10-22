<div class="container-fluid">
    
    <?php echo $this->session->flashdata('message')?>
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
                    <th class="th-lg">NO</th>
                    <th class="th-lg">PRODUCTS NAME</th>
                    <th class="th-lg">DESCRIPTION</th>
                    <th class="th-lg">PRICE</th>
                    <th class="th-lg">STOCKS</th>
                    <th class="th-lg">ACTION</th>
                    
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($product as $product) :?>
                <tr>
                    <td><?= ++$start?></td>
                    <td><?= $product['name']?></td>
                    <td><?= $product['description']?></td>
                    <td><?= $product['price']?></td>
                    <td><?= $product['stock']?></td>
                    <td>
                      <div class="d-flex p-2">
                        <?= anchor('home/detail_product/'.$product['id'],'<div class="btn btn-success btn-sm glyphicon-object-align-horizontal"><i class="fas fa-search-plus"></i></div>')?>               
                        <?= anchor('admin/manage_products/edit/'.$product['id'],'<div class="btn btn-primary btn-sm glyphicon-object-align-horizontal"><i class="fa fa-edit"></i></div>')?>
                        <?= anchor('admin/manage_products/delete/'.$product['id'],'<div class="btn btn-danger btn-sm glyphicon-object-align-horizontal"><i class="fa fa-trash"></i></div>')?>
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
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-grup">
                <label>Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-grup">
                <label>Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-grup">
                <label>Stocks</label>
                <input type="text" name="stock" class="form-control">
            </div>
            <div class="form-grup">
                <label>Images</label><br>
                <input type="file" name="img" id="img" class="form-control">               
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
</div>