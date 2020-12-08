<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<div id="result">
    <div class="container" >
        <h2>Analysis Results</h2>
        <div class="row" >
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
                    <div class="card-header bg-success font-weight-bold text-light">Diseases</div>
                        <div class="card-body">
                        <?php $temp_array = array();
                            $i = 0;
                            $key_array = array();
                        
                            foreach($listDiseases as $val) {
                                if (!in_array($val['cf_value'], $key_array)) {
                                    $key_array[$i] = $val['cf_value'];
                                    $temp_array[$i] = $val;
                                }
                                $i++;
                            }
                            ?>
                            <h1><?php echo $temp_array[0]['name'];?></h1>
                            <h5 class="card-title">Certainity Factor: </h5>
                            <h1 class="card-text"><?php echo $temp_array[0]['cf_value'];?> %</h1>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center">Diagnostic Results</h3>
            <?php $i = 1; foreach($listDiseases as $value){?>
                <div class="progress mb-4 " style="height:35px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?=$value['cf_value']?>%;" aria-valuenow="<?=$value['cf_value']?> " aria-valuemin="0" aria-valuemax="100"><?php echo $value['cf_value'].'% '.$value['name']." (".$value['code'].')';?> </div>
                </div>
            <?php }?>
            <!--box body-->
            <h2 class="box-title">Conclusion</h2>
            </div><!-- /.box-header -->
            <div class="container">
                <?php if(($listDiseases[0]['cf_value'])>0 && sizeof($listDiseases) <4 ) { ?>
                    <p>
                        Based on the symptoms, your pet has a disease of <b><?php echo $listDiseases[0]['name'];?></b> with a certainity factor of <b><?php echo $listDiseases[0]['cf_value'];?> %</b><br/>
                        <?php echo $listDiseases[0]['information'];?><p style="font-style: bold; color: red; font-size: 13px;">*The results of this diagnosis still require further examination at the vet to get more accurate results.</p>
                    </p>
                <?php }else{?>
                    <p>
                        The disease cannot be predicted because the certainity factor is too low and lack of information such as the selected symptoms
                    </p>
                <?php }?>
                
            </div>
        </div>
    </div>
</div>
<div class="clearfix mb-3  text-center container">
    <a href="<?=base_url('home/detail_services/2')?>" target="_blank"><div class="btn btn-sm btn-success text-light">Order PetHealth Now!</div></a>
    <a class="btn btn-sm btn-primary  mx-3 text-light" id="download" >Download Result</a>
</div>

<script>
window.onload = function(){
    document.getElementById("download").addEventListener("click", ()=>{
        const result = this.document.getElementById("result");
        console.log(result);
        console.log(window);
        const o_date = new Intl.DateTimeFormat;
        const f_date = (m_ca, m_it) => Object({...m_ca, [m_it.type]: m_it.value});
        const m_date = o_date.formatToParts().reduce(f_date, {});//get date
        var data = <?php echo json_encode($username, JSON_HEX_TAG); ?>;//get username
        var opt = {
                margin: 1,
                filename: 'report_'+data+'_'+m_date.day + '-' + m_date.month + '-' + m_date.year+'.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
        html2pdf().from(result).set(opt).save();
    });
}
</script>