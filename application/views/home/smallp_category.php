<div class="container-fluid my-5">
    <h2 class="mt-4">PRODUCTS</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam esse odit similique.</p>
    <div class="row">
        <div class="col-lg-2">
            <div class="sidebar_left mx-auto mb-4" style="width: 18rem;">
                <div class="card-header text-center back-head text-light">
                    <strong>CATEGORY</strong>
                </div>
                <ul class="nav flex-column text-center border ">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('home/products') ;?>">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark " href="<?= base_url('category/dog') ;?>">Dog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('category/cat') ;?>">Cat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="<?= base_url('category/birds') ;?>">Birds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-orange active" href="<?= base_url('category/smallp') ;?>" >Small Pets</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
                <div class="card mx-auto">
                    <div class="card-header back-head text-light">
                        <strong>SMALL PETS CATEGORY</strong>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <?php if(empty($smallp)) :?>
                                <p class="mx-2">Sorry, there are currently no products available at this category</p>
                            <?php else:?>
                                <?php foreach ($smallp as $pd) : ?>
                                        <div class="product_etalase card" style="width: 15rem;">
                                        <img src="<?= base_url().'/assets/products/'.$pd->img ?>" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1"><?= $pd->name ?></h5>
                                                <!-- <small><?= $pd->description ?></small> -->
                                                <br>
                                                <span class="badge badge-pill badge-success mb-3">RM <?= $pd->price ?></span>
                                                <br>
                                                <?= anchor('home/add_to_cart/'.$pd->id,'<div class="add_cart btn btn-cart">Add to cart</div>')?>
                                                <?= anchor('home/detail_product/'.$pd->id,'<div class="btn btn-detail">Detail</div>')?>
                                            </div>
                                        </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>