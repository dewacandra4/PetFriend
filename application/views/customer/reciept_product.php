
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="receipt bg-white p-3 rounded"><img width="160" src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend">
                <h4 class="mt-2 mb-3">Your order Status : <a> Confir<a></h4>
                <h6 class="name">Hello John,</h6><span class="fs-20 text-black-50">here is the detail of your order</span>
                <hr>
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                    <div><span class="d-block fs-12">Order date</span><span class="font-weight-bold">12 March 2020</span></div>
                    <div><span class="d-block fs-12">Order number</span><span class="font-weight-bold">OD44434324</span></div>
                    <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div>
                    <div><span class="d-block fs-12">Shipping Address</span><span class="font-weight-bold text-success">New Delhi</span></div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center product-details">
                    <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/GsFeDLn.jpg" width="80">
                        <div class="d-flex flex-column justify-content-between ml-2">
                            <div><span class="d-block font-weight-bold p-name">Ralco formal shirts for men</span><span class="fs-12">Clothes</span></div><span class="fs-12">Qty: 1pcs</span>
                        </div>
                    </div>
                    <div class="product-price">
                        <h5>$70</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center product-details">
                    <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/b7Ve3fJ.jpg" width="80">
                        <div class="d-flex flex-column justify-content-between ml-2">
                            <div><span class="d-block font-weight-bold p-name">Ralco formal Belt for men</span><span class="fs-12">Accessories</span></div><span class="fs-12">Qty: 1pcs</span>
                        </div>
                    </div>
                    <div class="product-price">
                        <h6>$50</h6>
                    </div>
                </div>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6 "></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">$120</span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span class="font-weight-bold">$15</span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Tax</span><span class="font-weight-bold">$5</span></div>
                            <div class="d-flex justify-content-between mt-2"><span class="text-success">Discount</span><span class="font-weight-bold text-success">$25</span></div>
                            <hr>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold text-success">$165</span></div>
                        </div>
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

.fs-12 {
    font-size: 12px
}

.fs-15 {
    font-size: 15px
}

.name {
    margin-bottom: -2px
}

.product-details {
    margin-top: 13px
}
</style>