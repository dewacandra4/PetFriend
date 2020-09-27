<div class="container bg-white mb-4 px-4 py-3"  style="border:1px solid #cecece;">
    <h3 class="text-center"><i class="fas fa-edit text-success"></i> EDIT CF VALUE</h3>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-2" style="margin-bottom: 5px;">
                    <span>Symptom : </span>
                </div>
                <input type="hidden" name="id" value="<?php echo $cf['cid'] ?>">
                <div class="col-md-12" style="margin-bottom: 5px;">
                    <select name="symptom_id" class="form-control" >
                        <?php
                            foreach ($symptoms as $s) {
                                echo " <option value='$s->id'";
                                echo $cf['symptom_id']==$s->id?'selected':'' ;
                                echo ">$s->symptom</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2" style="margin-bottom: 5px;">
                    <span>Disease : </span>
                </div>
                <div class="col-md-12">
                    <select name="disease_id" class="form-control" >
                        <?php
                            foreach ($diseases as $d) {
                                echo " <option value='$d->id'";
                                echo $cf['disease_id']==$d->id?'selected':'' ;
                                echo ">$d->name</option>";
                            }
                            ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2" style="margin-bottom: 5px;">
                    <span>MB Value : </span>
                </div>
                <div class="col-md-12">
                    <input type="text" name="mb" class="form-control" value="<?php echo $cf['mb'] ?>">
                </div>
                <?= form_error('mb','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2" style="margin-bottom: 5px;">
                    <span>MD Value : </span>
                </div>
                <div class="col-md-12">
                    <input type="text" name="md" class="form-control" value="<?php echo $cf['md'] ?>">
                </div>
                <?= form_error('md','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-lg btn-success my-4 btn-block" >Update</button>
            </div>
        </div>
    </form>
</div>
</div>