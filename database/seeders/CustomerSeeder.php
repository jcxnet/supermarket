<?php

namespace Database\Seeders;

use App\Data\Models\Customer;
use App\Data\Models\Order;
use App\Data\Models\OrderProduct;
use App\Data\Models\Store;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Customer::factory()->count(10)->create()->each(function ($customer){

             $stores = Store::paginate(10);

             foreach ($stores as $store) {
                 $buyHere = rand (1, 10);
                 if ($buyHere % 2) {
                     $max = rand(1,10);
                     $orders = Order::factory(['customer_id' => $customer->id,'store_id' => $store->id])->count($max)->create();

                     foreach ($orders as $order){
                         $products = $store->products()->get();
                         $amount = 0;
                         foreach ($products as $product){
                             $buyThis = rand(1, 10);
                             if ($buyThis % 2) {
                                $amount += $this->createOrderDetail($order->id, $product->id, $product->price);
                            }
                         }
                         if ($amount == 0) {
                             $product = $store->products()->first();
                             $amount += $this->createOrderDetail($order->id, $product->id, $product->price);
                         }
                         $order->total = $amount;
                     }

                     $customer->orders()->saveMany($orders);
                }
            }
        });
    }

    private function createOrderDetail(string $orderId, string $productId, float $price): float
    {
        $quantity = rand(1, 5);
        OrderProduct::firstOrCreate([
            'order_id' => $orderId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $quantity * $price,
        ]);

        return $quantity * $price;
    }
}
