<div class="container bg-white mb-4 px-4 py-3"  style="border:1px solid #cecece;">
    <h3 class="text-center "><i class="fas fa-plus-circle text-success"></i> ADD DISEASES</h3>
    <form action="<?= base_url().'doctor/manage_diseases/add_action';?>" method="post" enctype="multipart/form-data">
            <div class="form-grup">
                <label>Diseases Code</label>
                <input type="text" name="code" class="form-control" placeholder="e.g. D00X" value="<?=set_value('code');?>">
                <?= form_error('code','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-grup">
                <label>Diseases Name</label>
                <input type="text" name="name" class="form-control" >
                <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-grup">
                <label>Information</label>
                <textarea name="information" class="form-control" rows="10"></textarea>
                <?= form_error('information','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success my-4 btn-block">Save</button>
            </div>

    </form>
</div>
</div>