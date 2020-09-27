<h2 class="mt-4">Diagnosis</h2>
<h3 class="text-center mb-4">Choose your pet type :</h3>
<div class="row">
    <div class="container">
        <div class="card-deck mb-3 mx-2 text-center">
            <div class="card mb-4 shadow-sm single_service">
                <div class="card-header back-head text-light">
                    <strong class="my-0">Dog</strong>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">DOG</h1>
                    <div class="img-services">
                        <img src="<?= base_url().'/assets/diagnosis/dog.png' ?>" class="img-fluid">
                    </div>
                    <ul class="list-unstyled mt-1 mb-4">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    </ul>
                    <?= anchor('home/list_sympt/dog','<div class="btn btn btn-success">Start Diagnosis</div>');?>
                </div>
            </div>
            <div class="card mb-4 shadow-sm single_service">
                <div class="card-header back-head text-light">
                    <strong class="my-0">Cat</strong>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">CAT</h1>
                    <div class="img-services">
                        <img src="<?= base_url().'/assets/diagnosis/cat.png' ?>" class="img-fluid">
                    </div>
                    <ul class="list-unstyled mt-1 mb-4">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    </ul>
                    <?= anchor('home/list_sympt/cat','<div class="btn btn btn-success">Start Diagnosis</div>');?>
                </div>
            </div>
        </div>
    </div>
</div>