<?php
namespace App\Traits;
use Cart;
/**
 * A trait to handel all logic concerning the shopping cart functionality
 */
trait shoppingcartTrait
{
    /**
     * Adds a product to the shopping cart then redirect to the cart page
     * @param $product_id
     * @param $product_name
     * @param $quantity
     * @param $price
     */
    public function store($product_id,$product_name,$quantity, $price)
    {
        Cart::add($product_id,$product_name,$quantity,$price)->associate('App\Models\Product');
        session()->flash('success' , 'item was added successfuly');
        redirect('/cart');
    }
    /**
     * Increase the quantity of a cart item by 1
     * @param $row_id The cart item row id
     */
    public function increaseQty($row_id)
    {
       $product = Cart::get($row_id);
       $qty = $product->qty + 1;
       Cart::update($row_id,$qty);
       session()->flash('success','Item quantity has been increased successfully');
    }

    /**
     * decrease the quantity of a cart item by 1
     * @param $row_id The cart item row id
     */
    public function decreaseQty($row_id)
    {
       $product = Cart::get($row_id);
       $qty = $product->qty - 1;
       Cart::update($row_id,$qty);
       if($qty == 0)
           session()->flash('success','Item has been removed successfully');
       else
           session()->flash('success','Item quantity has been decreased successfully');
    }
}
