<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT SERVICES</h3>

    <?php foreach($services as $s) : ?>
        <form method="post" action="<?php echo base_url().'admin/manage_services/update';?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Services Name</label>
                <input type="hidden" name="id" class="form-control" value="<?= $s->id?>">
                <input type="text" name="name" class="form-control" value="<?= $s->name?>">
            </div>
            <div class="form-group">
                <label>Services Description</label>
                <input type="text" name="description" class="form-control" value="<?= $s->description?>">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="<?= $s->price?>">
            </div>
            <div class="form-grup">
                    <label>Resources</label>
                    <input type="text" name="resource" class="form-control" value="<?= $s->resource?>">
            </div>
            <div class="form-grup">
                <label>Images</label><br>
                <input type="file" name="img" id="img" class="form-control" >               
            </div>
            <div class="form-grup mt-4">
                <label>Available : </label>
                <input type="hidden" name="is_available" value="0" />
                <input type="checkbox" name="is_available" value="1" checked/>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>

        </form>
    <?php endforeach; ?>
</div>
</div>