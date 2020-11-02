<h2 class="mt-4">Services</h2>
<p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam esse odit similique.</p>
<div class="row">
    <div class="container">
        <div class="card-deck mb-3 mx-2 text-center">
        <?php foreach ($services as $s) : ?>
            <div class="card mb-4 shadow-sm single_service">
                <div class="card-header back-head text-light h5">
                    <strong class="my-0"><?= $s->name ?></strong>
                </div>
                <div class="card-body">
                    <h3 class="card-title pricing-card-title"><small class="text-muted">Starting from</small> <br>RM<?= $s->price?></h3>
                    <div class="img-services">
                        <img src="<?= base_url().'/assets/services/'.$s->img ?>" class="img-fluid">
                    </div>
                    <ul class="list-unstyled mt-0 mb-4">
                        <li><?= $s->description ?></li>
                    </ul>
                    <?php 
                    if($s->name == "Pet Health")
                    {
                        echo anchor('home/detail_services/'.$s->id,'<div class="btn btn-lg btn-block btn-contact">View Detail</div>');
                        echo "OR";
                        echo anchor('home/diagnosis','<div class="btn btn-lg btn-block btn-success">Diagnosis First!</div>');
                    }
                    else
                    {
                        echo anchor('home/detail_services/'.$s->id,'<div class="btn btn-lg btn-block btn-contact">View Detail</div>');
                    }
                    ?>
                    
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</div>