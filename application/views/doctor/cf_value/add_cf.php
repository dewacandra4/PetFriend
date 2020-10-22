<div class="container bg-white mb-4 px-4 py-3"  style="border:1px solid #cecece;">
    <h3 class="text-center "><i class="fas fa-plus-circle text-success"></i> ADD CF VALUE</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-2" style="margin-bottom: 5px;">
                <span>Symptoms : </span>
            </div>
        </div>
            <select name="symptom_id" class="form-control " required="required">
                <option>-Select-</option>
                <?php $symptoms_list = $this->model_cf->getSympt();
                ?>
                <?php foreach ($symptoms_list->result() as $key){ ?>
                    <option value="<?php echo $key->id ?>"><?php echo $key->symptom; ?></option>
                <?php } ?> 
            
            </select>
        <br>
        <div class="row">
            <div class="col-md-2" style="margin-bottom: 5px;">
                <span>Disease Name : </span>
            </div>
        </div>
        <select name="disease_id" class="form-control " required="required">
                <option>-Select-</option>
                <?php $disease_list = $this->model_cf->getDiseases();
                ?>
                <?php foreach ($disease_list->result() as $key){ ?>
                    <option value="<?php echo $key->id ?>"><?php echo $key->name; ?></option>
                <?php } ?> 
            </select>
        <br>
        <div class="row">
            <div class="col-md-2" style="margin-bottom: 5px;">
                <span>MB Value: </span>
            </div>
            <div class="col-md-12">
                <input type="text" name="mb" class="form-control" required="required">
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col-md-2" style="margin-bottom: 5px;">
                <span>MD Value : </span>
            </div>
            <div class="col-md-12">
                <input type="text" name="md" class="form-control" required="required">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-lg btn-success my-4 btn-block" >Save</button>
        </div>
    </form>
</div>
</div>