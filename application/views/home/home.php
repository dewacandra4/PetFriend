
    <!-- slider_area_start -->
    <div class="single_slider slider_bg_1 d-flex align-items-center">      
        <div class="col-lg-8 mx-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url()?>assets/banner/banner1R.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url()?>assets/banner/banner2R.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url()?>assets/banner/banner3R.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
    </div>
    <!-- slider_area_end -->
    <!-- featured-product start -->
    <div class="container mt-lg-5 " id="product">
        <div class="row">
            <div class="col-md-12">
                <h2>Featured <b>Products</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner " >
                    <!-- <div class="item carousel-item active"> -->
                        <div class="row mx-auto">
                            <?php $i = 0; foreach ($products as $p) : $item_class = ($i === 0) ? 'item carousel-item active' : 'item carousel-item';  ?>
                            <div class="<?php echo $item_class ?>">
                                <div class="col-sm-5 mx-auto my-1">
                                    <div class="thumb-wrapper">
                                        <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                        <div class="img-box">
                                            <img src="<?= base_url().'assets/products/'.$p->img;?>"class="img-fluid" alt="">	
                                        </div>
                                        <div class="thumb-content">
                                            <h4><?= $p->name;?></h4>						
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <small><?= $p->description;?></small>
                                            <p class="item-price"> <b>$<?= $p->price;?></b></p>
                                            <a href="#" class="btn btn-primary">Add to Cart</a>
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
    <!-- featured-product end -->
    <!-- service_area_start  -->
    <div class="service_area" id="service">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Services for your pet</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="<?= base_url()?>assets/anipat/img/service/service_icon_1.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Hotel</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service active">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="<?= base_url()?>assets/anipat/img/service/service_icon_2.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Health</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="<?= base_url()?>assets/anipat/img/service/service_icon_3.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Salon</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- service_area_end -->
    
