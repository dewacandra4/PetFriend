<!-- <body class="bg-gradient-danger"> -->
    
<div class="container pb-5 pt-5 my-5">
    <?php foreach($products as $pd): ?>
    <div class="card">
        <div class="card-body pb-4">
            <h2>Product Detail</h2>
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <img class="img-fluid card-img-top" src="<?= base_url().'/assets/products/'.$pd->img?>">
                    </div>
                    <div class="col-md-6 mx-auto">
                        
                        <table class="table">
                            <tr>
                                <h3 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                                <strong><?= $pd->name?></strong>
                                </h3>
                            </tr>
                            <tr>
                                <span class="badge badge-danger product mb-4 ml-xl-0 ml-4 text-center">bestseller</span>
                                <h3 class="h3-responsive text-center text-md-left mb-3 ml-xl-0 ml-4">
                                    <span class="text-danger font-weight-bold">
                                        <strong>RM <?= $pd->price?></strong>
                                    </span>
                                    <span class="text-secondary">
                                        <small>
                                        <s>RM<?= $pd->price+10;?>.00</s>
                                        </small>
                                    </span>
                                </h3>
                            </tr>
                            <tr>
                                <td>
                                <h5 class="text-center text-md-left mb-3 ml-xl-0 ml-4">Description</h5>
                                </td>       
                                <td>
                                    <h5><?= $pd->description?></h5>
                                </td>
                            </tr>            
                            <tr>
                                <td>
                                    <h5 class="text-center text-md-left mb-3 ml-xl-0 ml-4"> Stocks </h5>
                                </td> 
                                <td>
                                    <h5><?= $pd->stock?> Item</h5>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class="text-center text-md-left mb-3 ml-xl-0 ml-4"> Category</h5></td>
                                <td> <h5><?= $pd->category?></h5></td>
                            </tr>
                        </table>
                        <?php if (is_admin() == 1) : ?>
                        <?php elseif(is_admin() == 3) : ?>
                         <?php else : ?>
                            <div class="col-md-12 text-center text-md-left text-md-right">
                                <?= anchor('home/add_to_cart/'.$pd->id,'<div class="add_cart btn btn-cart-det btn-lg float-right mx-2 mt-5"><i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to Cart</div>')?>
                            </div>
                        <?php endif; ?>
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
                        $cate =$cat;
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
                                            <?php if (is_admin() == 1) : ?>
                                            <?php elseif(is_admin() == 3) : ?>
                                            <?php else : ?>
                                            <?= anchor('home/add_to_cart/'.$c->id,'<div class="btn btn-cart">Add to Cart</div>')?>
                                            <?php endif;?>
                                            <?= anchor('home/detail_product/'.$c->id,'<div class= "btn btn-success bg-success text-light">Detail</div>')?>
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
<style>
body {
    background-color: #eee
}
</style>