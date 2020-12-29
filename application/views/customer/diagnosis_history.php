<div class="container mb-5">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">My Diagnosis Result History</h5>
        </div>
        <div class="card-body mb-5">
            <div class="table-responsive">
                <table id="history" class="table table-bordered table-hover  mt-3" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th >NO</th>
                            <th >Disease Code</th>
                            <th >Disease Name</th>
                            <th >CF Value</th>
                            <th >Date Created</th>
                            <th >Time</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($diagnosis as $d) {?>
                        <tr>
                            <td><?= ++$start?></td>
                            <td><?= $d['code'];?></td>
                            <td><?= $d['name'];?></td>
                            <td><?= $d['cf_value'];?></td>
                            <td><?php 
                            if(empty(($d['created_at'])))
                            {
                                echo "-";
                            }
                            else
                            {
                                echo date('m-d-Y', $d['created_at']);
                            }
                            ?></td>
                            <td><?php 
                            if(empty(($d['created_at'])))
                            {
                                echo "-";
                            }
                            else
                            {
                                echo date('H:i:s', $d['created_at']);
                            }
                            ?>
                            </td>
                            <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                <!-- <form action="<?= base_url('customer/history_diagnosis/detail')?>" method="post" id="dateForm">
                                    <input type="hidden" name="date" value="<?= $d['created_at']?>">
                                    <input type="hidden" name="id" value="<?= $d['user_id']?>">
                                    <a ><div class="btn btn-deep-orange text-light btn-sm glyphicon-object-align-horizontal" onclick="document.getElementById('dateForm').submit();"><i class="fas fa-search-plus"></i></div></a>
                                </form> -->
                                <a href="<?= base_url('customer/history_diagnosis/detail/').$d['created_at'].'/'. $d['user_id']; ?>"><div class="btn btn-deep-orange text-light btn-sm glyphicon-object-align-horizontal"><i class="fas fa-search-plus"></i></div></a>
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
    <br>
</div>
</div>

