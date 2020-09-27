<div class="container bg-white mb-4 px-4 py-3"  style="border:1px solid #cecece;">
    <h3 class="text-center"><i class="fas fa-plus-circle text-success"></i> ADD SYMPTOM</h3>
    <form action="<?= base_url().'doctor/manage_sympt/add_action';?>" method="post" enctype="multipart/form-data">
            <div class="form-grup">
                <label>Symptom Code</label>
                <input type="text" name="code" class="form-control" placeholder="e.g. S00X" value="<?=set_value('code');?>">
                <?= form_error('code','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type_id">
                    <option value='1'>Dog (1)</option>
                    <option value='2'>Cat (2)</option>
                </select>
            </div>
            <div class="form-grup">
                <label>Symptom</label>
                <textarea name="symptom" class="form-control" rows="10"></textarea>
                <?= form_error('symptom','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success my-4 btn-block">Save</button>
            </div>

    </form>
</div>
</div>