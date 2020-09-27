<div class="container-fluid">
    <button class ="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#modalProduct"><i class="fas fa-plus fa-sm"></i> Add Products</button>
    <?php echo $this->session->flashdata('message')?>
    <table class="table table-responsive table-bordered">
        <tr>
            <th>NO</th>
            <th>PRODUCTS NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>STOCKS</th>
            <th colspan = "3">ACTION</th>
        </tr>
        <?php
       
        foreach($product as $product) :?>
        <tr>
            <td><?= ++$start?></td>
            <td><?= $product['name']?></td>
            <td><?= $product['description']?></td>
            <td><?= $product['price']?></td>
            <td><?= $product['stock']?></td>
            <td><?= anchor('home/detail_product/'.$product['id'],'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>')?></td>               
            <td><?= anchor('admin/manage_products/edit/'.$product['id'],'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
            <td><?= anchor('admin/manage_products/delete/'.$product['id'],'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
        </tr>
        <?php endforeach;?>
    </table>
  <?= $this->pagination->create_links();?>
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