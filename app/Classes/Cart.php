<?php

namespace App\Classes;

class Cart
{
    public $items = [];
    public $cartSize = 0;
    
    // ultimately this is what the array items should look like
    // [
    //     'id' => [
    //         'quantity' => int,
    //          'any_other_stuff' => random
    //     ]
    // ]
    
    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->cartSize = $oldCart->cartSize;
        }
    }

    public function addItem($id)
    {
        if($this->items)
        {
            if( array_key_exists( $id,  $this->items ) )
            {
                $this->items[$id]['qty']++;
                $this->cartSize++;
            }
            else
            {
                $this->items[$id]['qty'] = 1;
                $this->cartSize++;
            }
        }
        else
        {
            $this->items[$id]['qty'] = 1;
            $this->cartSize++;
        }
    }

    public function removeItem($id)
    {
        if( array_key_exists( $id,  $this->items ) && $this->items[$id]['qty'] != 0 )
        {
            $this->items[$id]['qty']--;
            $this->cartSize--;
        }
        else
        {
            logger('Received a request to remove an item from the cart that doesnt exist.');
        }
    }
}

?>
