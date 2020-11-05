<div class="container-fluid my-5 ">
    <h2 class="mt-4">PRODUCTS</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam esse odit similique.</p>
    <div class="row">
        <div class="col-lg-2">
            <div class="sidebar_left mx-auto mb-4" style="width: 18rem;">
                <div class="card">
                    <div class="card-header text-center back-head text-light">
                        <strong>CATEGORY</strong>
                    </div>
                    <div class="">
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
            </div>
        </div>
        <div class="col-lg-10 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
                <div class="card shadow bg-white rounded mx-auto">
                    <div class="card-header back-head text-light">
                        <strong>ALL PRODUCTS</strong>
                    </div>
                    <div class="card-body ">
                        <div class="row text-center">
                        <?php if(empty($products)) :?>
                                <p class="mx-2">Sorry, there are currently no products available at this category</p>
                        <?php else:?>
                            <?php foreach ($products as $product) : ?>
                                <div class="product_etalase card " style="width: 15rem;">
                                <img src="<?= base_url().'/assets/products/'.$product['img']?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1"><?= $product['name'] ?></h5>
                                        <!-- <small><?= $product['description'] ?></small> -->
                                        <br>
                                        <h3><span class="badge badge-success">RM <?= $product['price'] ?></span></h3>
                                        <br>
                                        <?php if (is_admin() == 1) : ?>
                                        <?php elseif(is_admin() == 3) : ?>
                                        <?php else : ?>
                                            <?php if($product['stock'] >=1) {?>
                                                <?= anchor('home/add_to_cart/'.$product['id'],'<div class="add_cart btn btn-cart">Add to cart</div>')?>
                                            <?php }else{?>
                                                    <span class="badge badge-warning">Out of Stock</span><br>
                                                <?php }?>
                                        <?php endif;?>
                                            <?= anchor('home/detail_product/'.$product['id'],'<div class="btn btn-detail">Detail</div>')?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        <?= $this->pagination->create_links();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
