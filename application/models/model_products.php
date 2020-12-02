<?php

class Model_products extends CI_Model{
    public function show_data(){
        return $this->db->get('products');
    }
    public function show_bestProduct()
    {
        $this->db->where('sold >', 100);
        return $this->db->get('products');
    }
    public function add_products($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_products($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function detail_product($id)
    {
        $result =  $this->db->select('*')
        ->from('products')
        ->join('category', 'category.id = products.category_id')
        ->where('products.id',$id)->get();
        if($result->num_rows()>0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }
    public function countAllProducts()
    {
        return $this->db->get('products')->num_rows();
    }
    public function sumSoldproduct()
    {
        return $this->db->query("SELECT sum(sold) AS total from products ");
    }
    public function countListProducts()
    {
        return $this->db->get('products_order')->num_rows();
    }

    //get count of all product order based on user id
    public function countListProducts_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('products_order')->num_rows();
    }

    public function getProducts()
    {
        return $this->db->get('products')->result_array();
    }
    public function getProductsPagination($limit, $start)
    {
        return $this->db->get('products',$limit, $start)->result_array();
    }
    public function countAllProductsAvail()
    {
        return $this->db->get('products')->num_rows();
        
    }

    //update status payment
    function updateStatus($data, $order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->update('products_order', $data);
        return TRUE;
    }

    public function search($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search ascending price order
    public function Asearch($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $this->db->order_by('price', 'ASC');
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search descending price order
    public function Dsearch($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $this->db->order_by('price', 'DESC');
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search between entered price
    public function Psearch($keyword,$max,$min)
    {
        $this->db->where('products.price >=', $min);
        $this->db->where('products.price <=', $max);
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//get all product order based on user id (displayed on My Order Product)
    public function get_myproducto($id, $limit, $start)
    {
        $names = array('Awaiting Payment', 'On Process');
        $this->db->where('user_id', $id);
        $this->db->where_in('order_status', $names);
        $result = $this->db->get('products_order', $limit, $start);
        return $result;
    }
//get product detail from product order_id
    public function get_myproducto_detail($oid)
    {
        return $this->db->get_where("products_order_detail", array('order_id'=> $oid));
    }
//get product order based on product order id
    public function get_myproducto_orderid($oid)
    {
        return $this->db->get_where("products_order", array('order_id'=> $oid));
    }

    //get all product order based on user id to verify the payment due date
    public function get_myproducto2($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $result = $this->db->get('products_order');
        return $result;
    }

    //get all product order count based on user id with status awaiting payment (displayed on Customer Dashboard)
    public function get_myproducto_await($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $result = $this->db->get('products_order')->num_rows();
        return $result;
    }


//REVIEW FUNCTION//

     //get review by product id
     function get_review($id)
     {
         $this->db->select('*');
         $this->db->from('review');
         $this->db->join('user', 'user.id = review.user_id');
         $this->db->where('review.product_id', $id);
         $result = $this->db->get();
         return $result;
     }
 
     //get count of review for a product
     function get_count_review($id)
     {
         $this->db->where('product_id', $id);
         $result = $this->db->get('review')->num_rows();
         return $result;
     }
 
      //chceck wheter the customer already rteview the product or not
     function check_review($id,$idc)
     {
         $this->db->where('product_id', $id);
         $this->db->where('user_id', $idc);
         $result = $this->db->get('review')->num_rows();
         return $result;
     } 
       //chceck wheter the customer had finish the order of the product or not
     function check_order($id,$idc)
     {
        $this->db->select('*');
        $this->db->from('products_order');
        $this->db->join('products_order_detail', 'products_order_detail.order_id = products_order.order_id');
        $this->db->where('products_order.user_id', $idc);
        $this->db->where('products_order_detail.product_id', $id);
        $result = $this->db->get()->num_rows();
        return $result;
     }

     //get 5 star review count
     function check_5($id)
     {
        $r=5;
        $this->db->where('product_id', $id);
        $this->db->where('rating', $r);
        $result = $this->db->get('review')->num_rows();
        return $result;
     }
    //get 4 star review count
     function check_4($id)
     {
        $r=4;
        $this->db->where('product_id', $id);
        $this->db->where('rating', $r);
        $result = $this->db->get('review')->num_rows();
        return $result;
     }
    //get 3 star review count
     function check_3($id)
     {
        $r=3;
        $this->db->where('product_id', $id);
        $this->db->where('rating', $r);
        $result = $this->db->get('review')->num_rows();
        return $result;
     }
     //get 2 star review count
     function check_2($id)
     {
        $r=2;
        $this->db->where('product_id', $id);
        $this->db->where('rating', $r);
        $result = $this->db->get('review')->num_rows();
        return $result;
     }
     //get 1 star review count
     function check_1($id)
     {
        $r=1;
        $this->db->where('product_id', $id);
        $this->db->where('rating', $r);
        $result = $this->db->get('review')->num_rows();
        return $result;
     }

     //get average rating of a product
     function average_rating($id)
     {
        $this->db->where('product_id', $id);
        $this->db->select_avg('rating');
        $result = $this->db->get('review')->row();
        return $result->rating;
     }

}