<div class="container">
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark ml-4">Products Order List</h5>
        </div>
        <div class="card-body">
            <table class="table text-center table-responsive table-bordered">
                <tr>
                    <th>NO</th>
                    <th>PRODUCTS ORDER ID</th>
                    <th>ORDER DATE</th>
                    <th>ORDER STATUS</th>
                    <th>CUSTOMER ID</th>
                    <th>PAYMENT METHOD</th>
                    <th>TOTAL PRICE</th>
                    <th>ACTION</th>
                </tr>
                <?php
            
                foreach($orders as $orders) :?>
                <tr>
                    <td><?= ++$start?></td>
                    <td><?= $orders['order_id']?></td>
                    <td><?= date('d F Y', $orders['order_date']);?></td>
                    <td><?= $orders['order_status']?></td>
                    <td><?= $orders['user_id']?></td>
                    <td><?= $orders['payment_method']?></td>
                    <td>RM <?= $orders['total_price']?></td>
                    <td><?= anchor('admin/list_order/view_detail/'.$orders['order_id'],'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>')?></td>               
                </tr>
                <?php endforeach;?>
            </table>
        </div>
  <?= $this->pagination->create_links();?>
</div>
</div>
</div>