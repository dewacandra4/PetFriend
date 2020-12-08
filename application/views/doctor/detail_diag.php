<div class="container bg-white my-5 py-5 border-secondary" >
        <h2>Analysis Results</h2>
        <br>
        <hr>
        <table>
            <tr>
                <th>Customer Name</th>
                <th><strong>: <?=$customer['name']?></strong></th>
            </tr>
            <tr>
                <th>Pet type</th>
                <th><strong>: <?= $type['name']?></strong></th>
            </tr>
        </table>
        <div class="row my-5 py-2" >
        
            <div class="col">
                <div class="box-body table-responsive">
                    <table id="tbl-list" class="table table-bordered">
                        <tr>
                            <th width="50px" class="bg-primary text-white">No</th>
                            <th class="bg-primary text-white text-center">Symptom</th>
                        </tr>
                        <tr>
                            <?php $i = 1; foreach($date as $value){?>
                                <tr>
                                    <td><?php echo $i++?></td>
                                    <td><?php echo $value['symptom']?></td>
                                </tr>
                            <?php }?>
                        </tr>
                    </table>
                </div><!--box body-->
            </div>
            <div class="col">
                <div class="card text-white text-center mb-3" style="max-width: 40rem; ">
                    <div class="card-header bg-primary font-weight-bold text-light">Diseases</div>
                        <div class="card-body text-dark">
                            <h3><strong><?php echo $listDiseases[0]['name']?></strong></h1>
                            <h5 class="card-title">Certainity Factor: </h5>
                            <h1><strong><?php echo $listDiseases[0]['cf_value'];?> %</strong></h1>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center">Diagnostic Results</h3>
            <?php $i = 1; foreach($listDiseases as $value){?>
                <div class="progress mb-4 " style="height:35px;">
                    <div class="progress-bar bg-green" role="progressbar" style="width: <?=$value['cf_value']?>%;" aria-valuenow="<?=$value['cf_value']?> " aria-valuemin="0" aria-valuemax="100"><?php echo $value['cf_value'].'% '.$value['name']." (".$value['code'].')';?> </div>
                </div>
            <?php }?>
            <!--box body-->
            </div><!-- /.box-header -->
        </div>
    </div>
</div>