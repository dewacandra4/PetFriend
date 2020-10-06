<div class="container-fluid my-5">
    <h2 class="mt-4">SEARCH RESULT</h2>
    <p class="text-center">The following are the search result ordered for price in descending order,  check all of our available products <a href="<?=base_url('home/products');?>" 
    class="font-weight-bold text-dark"> Here</a></p>
    <div class="row">
        <div class="col-lg-2">
            <div class="sidebar_left mx-auto mb-4" style="width: 18rem;">
                <div class="card-header text-center back-head text-light">
                    <strong>ITEMS ORDER</strong>
                </div>
                <form action="<?= base_url('Home/searchP');?>" method="post">
                <ul class="nav flex-column text-center border">
                <li class="nav-item p-1">
                    <?= anchor('home/searchN/'.$key,'<div class="nav-link text-dark">Normal Order</div>')?>
                </li>
                <li class="nav-item p-1">
                    <?= anchor('home/searchA/'.$key,'<div class="nav-link text-dark">Cheap to Expensive</div>')?>
                 </li>
                <li class="nav-item p-1">
                    <a class="nav-link text-orange active " href="#">Expensive to Cheap</a>
                </li>
                <li class="nav-item p-1">
                        <hr class="solid">
                        <div class="card-header text-center back-head text-light">
                        <strong>SEARCH BASE ON PRICE</strong>
                        </div>
                        &nbsp;
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">RM</span>
                        </div>
                        <input type="text" class="form-control" name="min" autocomplete="off" placeholder="Enter Min Price" required>
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                        </div>
                        <div class="input-group mb-1 pt-1 pd-8">
                        <div class="input-group-prepend">
                            <span class="input-group-text">RM</span>
                        </div>
                        <input type="text" class="form-control" name="max" autocomplete="off" placeholder="Enter Max Price" required>
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                        </div>
                        <input type="hidden" name="key" value="<?= $key?>">
                        <button class="add_cart btn btn-cart" type="submit">Search</button>
                    </li>
                </ul>
            </div>
        </div>
        </form>
        <div class="col-lg-10 mb-5 mb-lg-0">
            <div class="blog_left_sidebar">
                <div class="card mx-auto">
                    <div class="card-header back-head text-light">
                        <strong>SEARCH RESULT FOR : "<?= $key?>"</strong>
                    </div>
                    <div class="card-body ">
                        <div class="row text-center">
                          <?php if(empty($searchr)) :?>
                            <p class="mx-2">Sorry, there are currently no products like : "<?= $key?>"</p> 
                            <?php else:?>
                            <?php foreach ($searchr as $product) : ?>
                                <div class="product_etalase card " style="width: 15rem;">
                                <img src="<?= base_url().'/assets/products/'.$product->img ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1"><?= $product->name ?></h5>
                                        <!-- <small><?= $product->description ?></small> -->
                                        <br>
                                        <span class="badge badge-pill badge-success mb-3">RM <?= $product->price ?></span>
                                        <br>
                                        <?= anchor('home/add_to_cart/'.$product->id,'<div class="add_cart btn btn-cart">Add to cart</div>')?>
                                        <?= anchor('home/detail_product/'.$product->id,'<div class="btn btn-detail">Detail</div>')?>
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
