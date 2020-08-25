<div class="container-fluid my-5">
    <h2 class="mt-4">PRODUCTS</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam esse odit similique.</p>
    <div class="row">
        <div class="col-lg-2">
            <div class="sidebar_left mx-auto mb-4" style="width: 18rem;">
                <div class="card-header text-center  bg-danger text-light">
                    <strong>Category</strong>
                </div>
                <ul class="nav flex-column text-center border border-danger">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" href="#">Dog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Cat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Birds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#" >Small Pets</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
                <div class="card mx-auto">
                    <div class="card-header">
                        PRODUCTS
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <?php foreach ($products as $pd) : ?>
                                <div class="product_etalase card mx-2 my-3" style="width: 15rem;">
                                <img src="<?= base_url().'/assets/products/'.$pd->img ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1"><?= $pd->name ?></h5>
                                        <small><?= $pd->description ?></small>
                                        <span class="badge badge-pill badge-success mb-3">RM <?= $pd->price ?></span>
                                        <a href="#" class="btn btn-sm btn-success"> Add to Cart</a>
                                        <a href="#" class="btn btn-sm btn-danger"> Detail</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>