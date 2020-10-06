<!-- <body class="bg-gradient-danger"> -->
<div class="container pb-5 pt-5 my-5">
    <?php foreach($products as $pd): ?>
    <div class="card">
        <div class="card-header back-head text-light text-center">
            <strong><?= $pd->name?></strong>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid card-img-top" src="<?= base_url().'/assets/products/'.$pd->img?>">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Product </td>
                                <td><strong><?= $pd->name?></strong></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><strong><h3><span class="badge badge-pill badge-success">RM<?= $pd->price?></span></h3></strong></td>
                            </tr>
                            <tr>
                                <td>Stocks</td>
                                <td><?= $pd->stock?></td>
                            </tr>
                            
                            <tr>
                                <td>Category</td>
                                <td><?= $pd->category?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td class="text-justify"><?= $pd->description?></td>
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
                        <?= anchor('home/detail_product/'.$pd->id,'<div class="btn btn-detail float-right mx-2 mt-5">Buy now</div>')?>
                        <?= anchor('home/add_to_cart/'.$pd->id,'<div class="add_cart btn btn-cart float-right mx-2 mt-5">Add to Cart</div>')?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container mt-lg-5 " >
        <div class="row">
            <div class="col-md-12">
                <h2>Similar <b>Products Category</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                
                <ol class="carousel-indicators">
                
                <?php 
                    if(is_category() == 1)
                    {
                    $cate=$cat;
                    }
                    elseif (is_category() == 2)
                    {
                        $cate = $dog;
                    }
                    elseif (is_category() == 3)
                    {
                        $cate = $birds;
                    }
                    else
                    {
                        $cate = $smallp;
                    }
                    $count = count($cate);
                    for( $n = 0; $n<$count;$n++)
                    {
                        if($n==0)
                        {
                            echo "<li data-target='#myCarousel' data-slide-to= $n class='active'></li>";
                        }
                        else
                        {
                            echo "<li data-target='#myCarousel' data-slide-to= $n class=''></li>";
                        }
                    
                    }
                ?>
                </ol>
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner " >
                    <!-- <div class="item carousel-item active"> -->
                        <div class="row mx-auto">
                            <?php $i = 0; foreach ($cate as $c) : $item_class = ($i === 0) ? 'item carousel-item active' : 'item carousel-item'; ?>
                            <div class="<?= $item_class ?>">
                                <div class="col-sm-5 mx-auto my-1">
                                    <div class="thumb-wrapper">
                                        <div class="img-box">
                                            <img src="<?= base_url().'assets/products/'.$c->img;?>"class="img-fluid" alt="">	
                                        </div>
                                        <div class="thumb-content">
                                            <h4><?= $c->name;?></h4>						
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <p class="item-price"> <b>RM<?= $c->price;?></b></p>
                                            <?= anchor('home/detail_product/'.$c->id,'<div class="btn btn-cart">Add to Cart</div>')?>
                                            <?= anchor('home/detail_product/'.$c->id,'<div class="btn-detail">Detail</div>')?>
                                        </div>						
                                    </div>
                                </div>
                            </div>
                            <?php $i++; endforeach; ?>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
		</div>
	</div>
</div>
</div>
</div>
