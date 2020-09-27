<div class="container bg-white mb-4 px-4 py-3"  style="border-radius:5px; border:1px solid #cecece;" >
    <h3 class="font-weight-bold text-center">List of Diseases</h3>
<a href="<?=base_url('doctor/manage_diseases/add_action');?>" class="btn btn-success mb-3" style="border-radius: 0px; font-size: 14px;" ><i class="fa fa-plus"></i> <strong> Add Disesases</strong></a>
<?php echo $this->session->flashdata('message')?>
<div class="row justify-content-center">
    <div class="col-auto">
        <table class="table table-responsive table-bordered ">
            <tr>
                <th>NO</th>
                <th>Diseases Name</th>
                <th>Diseases Code</th>
                <th>Early Treatment / Prevention</th>
                <th colspan = "2">Action</th>
            </tr>
            <?php
            foreach($disease as $disease) :?>
            <tr>
                <td><?= ++$start?></td>
                <td><?= $disease['name']?></td>
                <td><?= $disease['code']?></td>
                <td><?= $disease['information']?></td>
                <td><?= anchor('doctor/manage_diseases/edit/'.$disease['id'],'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                <td><?= anchor('doctor/manage_diseases/delete/'.$disease['id'],'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
</div>
<?= $this->pagination->create_links();?>
</div>

