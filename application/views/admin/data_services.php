<div class="container bg-white rounded pt-4">
    <h2 class="text-center mb-4">Services</h2>
    <div class="card-deck mb-3 mx-2 text-center">
        <?php foreach ($services as $s) : ?>
            <div class="card mb-4 shadow-sm single_service">
                <div class="card-header back-head text-dark">
                    <strong class="my-0"><?= $s->name ?></strong>
                </div>
                <div class="card-body">           
                <?= anchor('admin/manage_services/edit/'.$s->id,'<div class="btn btn-primary btn-sm mb-4"><i class="fa fa-edit"></i> Edit </div>')?>
                    <h1 class="card-title pricing-card-title">$<?= $s->price ?> <small class="text-muted">/ mo</small></h1>
                    <div class="img-services">
                        <img src="<?= base_url().'/assets/services/'.$s->img ?>" class="img-fluid">
                    </div>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><?= $s->description ?></li>
                        <li>
                            <strong>Resources : <?= $s->resource?></strong>
                        </li>
                </div>
                    </ul>
            </div>
        <?php endforeach;?>
    </div>
</div>
</div>
