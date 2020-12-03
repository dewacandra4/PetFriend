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
                                <h3 class="h2-responsive text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">
                                <strong><?= $pd->name?></strong>
                                </h3>
                            </tr>
                            <tr>
                            <?php if($pd->sold >100){?>
                                <span class="badge badge-danger product mb-4 ml-xl-0 ml-4 text-md-right">bestseller</span>
                            <?php }
                            if(date('Y-m-d',(($pd->date_added)))<=time() && date('Y-m-d',strtotime('-30day',((time()))))<date('Y-m-d',(($pd->date_added)))) {?>&nbsp;
                                <span class="badge badge-success product mb-4 ml-xl-0 ml-4 text-md-right">newproduct</span>
                            <?php } ;?>
                                <h3 class="h3-responsive text-center text-md-right mb-3 ml-xl-0 ml-4">
                                    <span class="text-danger font-weight-bold ">
                                        <strong>RM <?= $pd->price?> </strong>
                                    </span>
                                    <span class="text-secondary ">
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
                            <?php if($pd->stock >=1){?>
                            <div class="col-md-12 mt-5text-center">
                                <?= anchor('home/add_to_cart/'.$pd->id,'<div class="add_cart btn btn-cart-det btn-lg  float-right mx-auto mt-5"><i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Add to Cart</div>')?>
                            </div>
                            <?php } else{?>
                                <div class="alert alert-warning" role="alert">
                                    <strong>Sorry we are out of stock for this product!</strong>
                                </div>
                            <?php }?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Carousel Review Product -->
    <?php 
    date_default_timezone_set('Asia/Singapore');
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    ?>
<div class="container mt-lg-5 " >
        <div class="row">
            <div class="col-md-12">
                <h2>Product Review <b></b></h2>
                
                <?php if ($review == null) : ?>
                <h4 class="text-center">No review for this product yet ^^</h4>
                <?php endif?>

                <div id="ReviewC" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                
                <ol class="carousel-indicators">
                <?php 
                    $count = $review_count;
                    for( $n = 0; $n<$count;$n++)
                    {
                        if($n==0)
                        {
                            echo "<li data-target='#ReviewC' data-slide-to= $n class='active'></li>";
                        }
                        else
                        {
                            echo "<li data-target='#ReviewC' data-slide-to= $n class=''></li>";
                        }
                    
                    }
                ?>
                </ol>

                <!-- Rating Info -->
                <?php $rate = round($avg_rating);?>
                <span class="heading md-center">Average Rating:</span>
                <?php if ($rate == 1) : ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php endif;?>
                <?php if ($rate == 2) : ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php endif;?>
                <?php if ($rate == 3) : ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <?php endif;?>
                <?php if ($rate == 4) : ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <?php endif;?>
                <?php if ($rate == 5) : ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <?php endif;?>
                <p><?php echo $avg_rating ?> Average based on <?php echo $review_count ?>  reviews.</p>
                <hr style="border:3px solid #f1f1f1">

                <div class="row">
                <div class="side">
                    <div>5 stars</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-5"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $check_5?></div>
                </div>
                <div class="side">
                    <div>4 stars</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-4"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $check_4?></div>
                </div>
                <div class="side">
                    <div>3 stars</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-3"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $check_3?></div>
                </div>
                <div class="side">
                    <div>2 stars</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-2"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $check_2?></div>
                </div>
                <div class="side">
                    <div>1 star</div>
                </div>
                <div class="middle">
                    <div class="bar-container">
                    <div class="bar-1"></div>
                    </div>
                </div>
                <div class="side right">
                    <div><?php echo $check_1?></div>
                </div>
                </div>
                <!-- Wrapper for carousel items -->
                <br><br><div class="carousel-inner " >
                    <!-- <div class="item carousel-item active"> -->
                        <div class="row mx-auto">
                            <?php $i = 0; foreach ($review as $c) : $item_class = ($i === 0) ? 'item carousel-item active' : 'item carousel-item'; ?>
                            <div class="<?= $item_class ?>">
                                <div class="col-sm-10 mx-auto my-1">
                                    <div class="thumb-wrapper">
                                    <div class="row mx-auto">
                                    <div class="col-sm-4 border-right">
                                    <div class="img-box">
                                            <img src="<?= base_url().'assets/dp/'.$c->image;?>"class="img-fluid" alt="">	
                                        </div>
                                        <h4><?= $c->name;?></h4>						
                                            <?php $reviewd = time_elapsed_string(date('Y/m/d H:i:s',$c->review_date));?>
                                            <p><?= $reviewd;?></p>
                                    </div>
                                    <div class="col">
                                    <div class="thumb-content">
                                    <h4><?= $c->title;?></h4></div>
                                            <div class="star-rating">
                                            <?php $rating= $c->rating;?>
                                                <ul class="list-inline">
                                                <?php if ($rating == 1) : ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php endif;?>
                                                <?php if ($rating == 2) : ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php endif;?>
                                                <?php if ($rating == 3) : ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <?php endif;?>
                                                <?php if ($rating == 4) : ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <?php endif;?>
                                                <?php if ($rating == 5) : ?>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <?php endif;?>
                                                </ul>
                                            </div><br>
							                <p><?= $c->content;?></p>
                                        </div>						
                                    </div>
                                </div>
                                </div>
                            </div>
                            <?php $i++; endforeach; ?>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#ReviewC" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#ReviewC" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
		</div>
	</div>
</div>
</div>

 <!-- Review Form -->
 <form method="post"  action="<?= base_url('home/order_products');?>" autocomplete="off">
 <div class="container mt-lg-5 border-top">
    <div class="row">
        <div class="col-md-12">
        <h2>Write a Review</h2>
        <p class="text-center">Dear <?=$customer['name'];?> you haven't made a review for this product yet ^^ </p>
            <div class="panel panel-info">
                <div class="panel-body">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input readonly class="form-control" id="name" value="<?=$customer['name'];?>">
                </div>
                <label for="ra">Give Rating 1-5</label><br>
                <div class="rating" id="ra">
                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                    </div><br><br>
                <div class="form-group">
                    <label for="sub">Subject</label>
                    <input type="text" class="form-control" id="sub" placeholder="Few word about the product" name="title" required>
                </div>
                <label for="area">Review Content</label>
                    <textarea id="area" placeholder="Write your review here!  (Optional)" maxlength="200" class="pb-cmnt-textarea" name="content"></textarea>
                    <div class="word-counter mr-3">0/200</div>
                    <?php foreach($products as $pd): ?>
                        <input type="hidden" name="product_id" value="<?=$customer['id'];?>">
                        <input type="hidden" name="user_id" value="<?= $pd->id?>">
                        <button class="btn btn-cart p-3 mt-3" type="button">Submit <i class="fas fa-pen-square"></i></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


    <!-- Carousel Similar Product -->
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
                                            <p class="item-price "> <b>RM<?= $c->price;?></b></p>
                                            <?php if (is_admin() == 1) : ?>
                                                <?php elseif(is_admin() == 3) : ?>
                                                <?php else : ?>
                                                    <?php if($c->stock >=1) {?>
                                                        <?= anchor('home/add_to_cart/'.$c->id,'<div class="add_cart btn btn-cart">Add to cart</div>')?>
                                                    <?php }else{?>
                                                        <span class="badge badge-warning">Out of Stock</span><br>
                                                    <?php }?>
                                                <?php endif;?>
                                                    <?= anchor('home/detail_product/'.$c->id,'<div class="btn btn-detail">Detail</div>')?>
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
.pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
body {
    background-color: #fdfcfc
}
* {
  box-sizing: border-box;
}


.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top: 10px;
}

.middle {
  float: left;
  width: 70%;
  margin-top: 10px;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

.word-counter {
position:absolute;
bottom: 1;
right:0;
}

/* Individual bars */
.bar-5 {width: <?php echo $check_5.'%';?>; height: 18px; background-color: #4CAF50;}
.bar-4 {width: <?php echo $check_4.'%';?>; height: 18px; background-color: #2196F3;}
.bar-3 {width: <?php echo $check_3.'%';?>; height: 18px; background-color: #00bcd4;}
.bar-2 {width: <?php echo $check_2.'%';?>; height: 18px; background-color: #ff9800;}
.bar-1 {width: <?php echo $check_1.'%';?>; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  /* Hide the right column on small screens */
  .right {
    display: none;
  }
}

.rating {
    float:left;
}
.rating span { float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}
</style>

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
$('#area').keyup(function(){
    $('.word-counter').text($.trim(this.value.length)+'/200');
})
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
</script>
<script>
    $(document).ready(function(){
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    }); 
});
</script>
