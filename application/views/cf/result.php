<section class="call-to-action-area section-gap " style="background-image: -webkit-linear-gradient(0deg, #ffffff 0%, #ffffff 100%) !important; padding:60px 120px;" id="printTable" >
<!-- <div class="content" style="padding:10px 40px;"> -->
    <h2>Analysis Results</h2>
    <div class="box box-warning">
        <div class="box-header with-border">
            <h6 class="box-title">Symptoms</h6>
        </div><!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="tbl-list" class="table table-bordered">
                <tr>
                    <th width="50px" class="bg-success text-white">No</th>
                    <th class="bg-success text-white">Symptom</th>
                </tr>
                <tr>
                    <?php $i = 1; foreach($listSymptom->result() as $value){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $value->code." - ".$value->symptom?></td>
                        </tr>
                    <?php }?>
                </tr>
            </table>
        </div><!--box body-->
    </div><!--box-->
    <div class="box box-success">
        <div class="box-header with-border">
            <h6 class="box-title">Diagnostic Results</h6>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="tbl-list" class="table table-bordered">
                <tr>
                    <th class="bg-success text-white">No</th>
                    <th class="bg-success text-white">Disease</th>
                    <th class="bg-success text-white">The level of credibility</th>
                </tr>
                <tr>
                    <?php $i = 1; foreach($listDiseases as $value){?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $value['code']." - ".$value['name']?></td>
                            <td><?php echo $value['credibility']?> %</td>
                        </tr>
                    <?php }?>
                </tr>
            </table>
        </div><!--box body-->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-header with-border">
            <h6 class="box-title">Conclusion</h6>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php if(($listDiseases[0]['credibility'])>0 && sizeof($listDiseases) <4 ) { ?>
                <p>
                    Based on the symptoms, your pet has a disease of <b><?php echo $listDiseases[0]['name'];?></b> with level a level of credibility of <b><?php echo $listDiseases[0]['credibility'];?> %</b><br/>
                    <?php echo $listDiseases[0]['information'];?>. <p style="font-style: bold; color: red; font-size: 13px;">*The results of this diagnosis still require further examination at the vet to get more accurate results.</p>
                </p>
            <?php }else{?>
                <p>
                    The disease cannot be predicted because the level of credibility is too low and lack of information such as the selected symptoms
                </p>
            <?php }?>
        </div><!--box body-->
        <div class="box-footer clearfix">
            <a class="btn btn-sm btn-flat pull-right" style="background: #67CDFF; color: white;" href="<?php echo site_url()?>/home/list_sympt/dog">Back </a>
            <button class="btn btn-sm btn-flat pull-right" style="background: #67CDFF; color: white; margin-right:10px;" onclick>Cetak</button> 
           
        </div>
    </div><!--box-->
</div>
</section>
<script type="text/javascript">
    function printData()
    {
        var
        divToPrint=document.getElementById('printTable');
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('button').on('click',function(){
        printData();
    })
</script>