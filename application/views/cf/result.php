<div class="container">
    <h2>Analysis Results</h2>
    <div class="row ">
        <div class="col">
            <div class="box-body table-responsive">
                <table id="tbl-list" class="table table-bordered">
                    <tr>
                        <th width="50px" class="bg-success text-white">No</th>
                        <th class="bg-success text-white text-center">Symptom</th>
                    </tr>
                    <tr>
                        <?php $i = 1; foreach($listSymptom->result() as $value){?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $value->symptom?></td>
                            </tr>
                        <?php }?>
                    </tr>
                </table>
            </div><!--box body-->
        </div>
        <div class="col">
            <div class="card text-white text-center mb-3" style="max-width: 40rem; ">
                <div class="card-header bg-success"><strong>Diseases</strong></div>
                    <div class="card-body">
                        <h1><?php echo $listDiseases[0]['name'];?></h1>
                        <h5 class="card-title">Certainity Factor: </h5>
                        <h1 class="card-text"><?php echo $listDiseases[0]['credibility'];?> %</h1>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center">Diagnostic Results</h3>
        <?php $i = 1; foreach($listDiseases as $value){?>
            <div class="progress mb-4 " style="height:35px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?=$value['credibility']?>%;" aria-valuenow="<?=$value['credibility']?> " aria-valuemin="0" aria-valuemax="100"><?php echo $value['credibility'].'% '.$value['name']." (".$value['code'].')';?> </div>
            </div>
        <?php }?>
        <!--box body-->
            <h2 class="box-title">Conclusion</h2>
        </div><!-- /.box-header -->
        <div class="container">
            <?php if(($listDiseases[0]['credibility'])>0 && sizeof($listDiseases) <4 ) { ?>
                <p>
                    Based on the symptoms, your pet has a disease of <b><?php echo $listDiseases[0]['name'];?></b> with a certainity factor of <b><?php echo $listDiseases[0]['credibility'];?> %</b><br/>
                    <?php echo $listDiseases[0]['information'];?>. <p style="font-style: bold; color: red; font-size: 13px;">*The results of this diagnosis still require further examination at the vet to get more accurate results.</p>
                </p>
            <?php }else{?>
                <p>
                    The disease cannot be predicted because the certainity factor is too low and lack of information such as the selected symptoms
                </p>
            <?php }?>
            <div class="clearfix mb-3">
                <a class="btn btn-sm btn-success pull-right" href="<?php echo site_url()?>/home/list_sympt/dog">Back </a>
            </div>
        </div>
</div>