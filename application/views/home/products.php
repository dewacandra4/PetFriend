<div class="container-fluid my-5">
    <h2 class="mt-4">PRODUCTS</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam esse odit similique.</p>
    <div class="row">
        <div class="col-lg-2">
            <div class="sidebar_left mx-auto mb-4" style="width: 18rem;">
                <div class="card-header text-center back-head text-light">
                    <strong>CATEGORY</strong>
                </div>
                <ul class="nav flex-column text-center border">
                    <li class="nav-item">
                        <a class="nav-link text-orange active" href="<?= base_url('home/products') ;?>">All Products</a>
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
                        <a class="nav-link text-dark" href="<?= base_url('category/smallp') ;?>" >Small Pets</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
                <div class="card mx-auto">
                    <div class="card-header back-head text-light">
                        <strong>ALL PRODUCTS</strong>
                    </div>
                    <div class="card-body ">
                        <div class="row text-center">
                            <?php foreach ($products as $product) : ?>
                                <form method="post" action="<?php echo base_url().'Home/add_to_cart';?>" enctype="multipart/form-data">
                                <div class="product_etalase card " style="width: 15rem;">
                                <img src="<?= base_url().'/assets/products/'.$product['img']?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1"><?= $product['name'] ?></h5>
                                        <!-- <small><?= $product['description'] ?></small> -->
                                        <br>
                                        <span class="badge badge-pill badge-success mb-3">RM <?= $product['price'] ?></span>
                                        <br>
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="name" class="form-control" value="<?php echo $product['name']; ?>">
                                        <input type="hidden" name="price" class="form-control" value="<?php echo $product['price']; ?>">
                                        <input type="hidden" name="quantity" class="form-control" value="1">
                                        <input type="hidden" name="image" class="form-control" value="<?php echo $product['img']; ?>">
                                        <input type="hidden" name="cat" class="form-control" value="<?php echo $product['category']; ?>">
                                        <input type="hidden" name="stocks" class="form-control" value="<?php echo $product['stock']; ?>">
                                        <button type="submit" class="add_cart btn btn-cart">Add to Cart</button>
                                        <?= anchor('home/detail_product/'.$product['id'],'<div class="btn btn-detail">Detail</div>')?>
                                    </div>
                                </div>
                                </form>
                            <?php endforeach; ?>
                            
                        </div>
                        <?= $this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>