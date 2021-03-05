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
}
