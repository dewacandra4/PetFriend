<div class="container bg-white mb-4 px-4 py-3"  style="border:1px solid #cecece;">
    <h3 class="text-center"><i class="fas fa-edit text-success"></i> EDIT SYMPTOM</h3>

    <?php foreach($symptoms as $ds) : ?>
        <form method="post" action="<?php echo base_url().'doctor/manage_sympt/edit/'.$ds->id;?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category">
                    <option>Dog</option>
                    <option>Cat</option>
                </select>
            </div>
            <div class="form-group">
                <label>Symptom Code</label>
                <input type="hidden" name="id" class="form-control" value="<?= $ds->id?>">
                <input type="text" name="code" class="form-control" value="<?= $ds->code?>" disabled>
            </div>
            <div class="form-group">
                <label>Symptom</label>
                <textarea name="symptom" class="form-control" rows="10"><?= $ds->symptom?></textarea>
                <?= form_error('symptom','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-lg btn-success my-4 btn-block" >Update</button>
            </div>

        </form>
    <?php endforeach; ?>
</div>
</div>