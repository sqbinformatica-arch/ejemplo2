<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_complete_cart_flow()
    {
       
        $user = User::factory()->create();

        $product1 = Product::create([
            'name' => 'Producto 1',
            'price' => 10000
        ]);

        $product2 = Product::create([
            'name' => 'Producto 2',
            'price' => 20000
        ]);

        $this->actingAs($user)
             ->post('/cart/add/' . $product1->id)
             ->assertRedirect();

        
        $this->actingAs($user)
             ->post('/cart/add/' . $product2->id)
             ->assertRedirect();

      
        $cart = session('cart');
        $this->assertArrayHasKey($product1->id, $cart);
        $this->assertArrayHasKey($product2->id, $cart);

        
        $this->assertEquals(1, $cart[$product1->id]['quantity']);
        $this->assertEquals(10000, $cart[$product1->id]['price']);

        $this->assertEquals(1, $cart[$product2->id]['quantity']);
        $this->assertEquals(20000, $cart[$product2->id]['price']);

        
        $this->actingAs($user)
             ->delete('/cart/remove/' . $product1->id)
             ->assertRedirect();

       
        $cartAfterRemove = session('cart');
        $this->assertArrayNotHasKey($product1->id, $cartAfterRemove);
        $this->assertArrayHasKey($product2->id, $cartAfterRemove);

        
        $total = $cartAfterRemove[$product2->id]['price'] * $cartAfterRemove[$product2->id]['quantity'];
        $this->assertEquals(20000, $total);
    }
}