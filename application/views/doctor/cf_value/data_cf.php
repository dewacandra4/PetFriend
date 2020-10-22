<div class="container bg-white mb-4 px-4 py-3 "  style="border-radius:5px; border:1px solid #cecece;" >
    <h3 class="font-weight-bold text-center">List of CF Value</h3>
    <a href="<?=base_url('doctor/manage_cf/create') ?>" class="btn btn-success mb-3" style="border-radius: 0px; font-size: 14px;" ><i class="fa fa-plus"></i> <strong>Add CF Value</strong></a>
    <?php echo $this->session->flashdata('message')?>
    <div class="row justify-content-center">
        <div class="col-auto">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Symptoms</th>
                        <th>Disease</th>
                        <th>MB Value</th>
                        <th>MD Value</th>
                        <th colspan = "2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($cf as $data): ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $data['symptom'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['mb'] ?></td>
                        <td><?php echo $data['md'] ?></td>
                        <td><?= anchor('doctor/manage_cf/edit/'.$data['id_cf'],'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                        <td><?= anchor('doctor/manage_cf/delete/'.$data['id_cf'],'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
		</div>
    </div>
    </div>
    <?= $this->pagination->create_links();?>
</div>