<!-- <body class="bg-gradient-danger"> -->
<div class="container pb-5 pt-5 my-5">
    <?php foreach($services as $s): ?>
    <div class="card">
        <div class="card-header back-head text-light text-center">
            <strong><?= $s->name?></strong>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid card-img-top" src="<?= base_url().'/assets/services/'.$s->img?>">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Product </td>
                                <td><strong><?= $s->name?></strong></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><strong><h3><span class="badge badge-pill badge-success">RM<?= $s->price?></span></h3></strong></td>
                            </tr>
                            <tr>
                                <td>Stocks</td>
                                <td><?= $s->resource?></td>
                            </tr>
                            
                            <tr>
                                <td>Category</td>
                                <td><?= $s->category?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td class="text-justify"><?= $s->description?></td>
                            </tr>
                        </table>
                        <div class="star-rating float-right mr-3">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                            </ul>
                            
                        </div>
                        <br>
                        <?= anchor('home/detail_product/'.$s->id,'<div class="btn btn-detail float-right mx-2 mt-5">Buy now</div>')?>
                        <?= anchor('home/add_cart/'.$s->id,'<div class="btn btn-cart float-right mt-5">Add to Cart</div>')?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>