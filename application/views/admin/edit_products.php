<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT PRODUCTS</h3>

    <?php foreach($products as $pd) : ?>
        <form method="post" action="<?php echo base_url().'admin/manage_products/update';?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Product Name</label>
                <input type="hidden" name="id" class="form-control" value="<?= $pd->id?>">
                <input type="text" name="name" class="form-control" value="<?= $pd->name?>">
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <input type="text" name="description" class="form-control" value="<?= $pd->description?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?= $pd->price?>">
            </div>
            <div class="form-grup">
                    <label>Stocks</label>
                    <input type="text" name="stock" class="form-control" value="<?= $pd->stock?>">
            </div>
            <div class="form-grup">
                <label>Images</label><br>
                <input type="file" name="img" id="img" class="form-control" >               
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>

        </form>
    <?php endforeach; ?>
</div>
</div>