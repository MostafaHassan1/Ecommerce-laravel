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
    public function store($product_id, $product_name, $quantity, $price, $cart_instance)
    {
        Cart::instance($cart_instance)->add($product_id, $product_name, $quantity, $price)->associate('App\Models\Product');
        session()->flash('success', 'item was added to ' . $cart_instance . ' successfuly');
        $this->emitTo('cart-header-component', 'refreshComponent');
    }
    /**
     * Increase the quantity of a cart item by 1
     * @param $row_id The cart item row id
     */
    public function increaseQty($row_id)
    {
        $product = Cart::instance('cart')->get($row_id);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($row_id, $qty);
        session()->flash('success', 'Item quantity has been increased successfully');
        $this->emitTo('cart-header-component', 'refreshComponent');
    }

    /**
     * decrease the quantity of a cart item by 1
     * @param $row_id The cart item row id
     */
    public function decreaseQty($row_id)
    {
        $product = Cart::instance('cart')->get($row_id);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($row_id, $qty);
        if ($qty == 0)
            session()->flash('success', 'Item has been removed successfully');
        else
            session()->flash('success', 'Item quantity has been decreased successfully');
        $this->emitTo('cart-header-component', 'refreshComponent');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success', 'All items have been removed successfully');
        $this->emitTo('cart-header-component', 'refreshComponent');
    }
    public function removeItem($item_id, $cart_instance)
    {
        foreach (Cart::instance($cart_instance)->content() as $cart_item) {
            if ($cart_item->id == $item_id) {
                Cart::instance($cart_instance)->remove($cart_item->rowId);
                session()->flash('success', 'item was removed from ' . $cart_instance . ' successfuly');
                $this->emitTo('cart-header-component', 'refreshComponent');
                break;
            }
        }
    }
    /**
     * This function search the wishlist cart for an item
     * if it's in the cart remove it
     * if not then add it (Toggle)
     */
    public function toggleWishlist($product_id, $product_name, $quantity, $price)
    {
        $flag = false;
        foreach (Cart::instance('wishlist')->content() as $cart_item) {
            if ($cart_item->id == $product_id) {
                Cart::instance('wishlist')->remove($cart_item->rowId);
                session()->flash('success', 'item was removed from wishlist successfuly');
                $flag = true;
                break;
            }
        }
        if (!$flag) {
            Cart::instance('wishlist')->add($product_id, $product_name, $quantity, $price)->associate('App\Models\Product');
            session()->flash('success', 'item was added to wishlist successfuly');
        }
        $this->emitTo('cart-header-component', 'refreshComponent');
    }
}
