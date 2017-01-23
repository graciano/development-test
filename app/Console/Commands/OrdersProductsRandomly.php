<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Model\Product;
use App\Model\Order;
use App\Model\OrderItem;

class OrdersProductsRandomly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Orders random products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::transaction(function () {
            $faker = \Faker\Factory::create();
            $numberOfProducts = $faker->numberBetween(1,5);
            $products = Product::inRandomOrder()
                                ->limit($numberOfProducts)  
                                ->get();
            $order = new Order([
                                'email' => $faker->email,
                                'name' => $faker->name,
                                'phone' => $faker->phoneNumber,
                                'address' => "$faker->streetName, "
                                        .$faker->numberBetween(1, 2000),
                                'city' => $faker->city,
                                'state' =>$faker->state,
                                'country' => $faker->country,
                               ]);
            $order->total_price = 0;
            $order->save();
            foreach($products as $product){
                $item = new OrderItem();
                $item->product()->associate($product);
                $item->order()->associate($order);
                $item->quantity = $faker->numberBetween(1,10);

                $product->stock -= $item->quantity;
                $product->save();
                
                $item->subtotal = $product->price * $item->quantity;
                $order->total_price += $item->subtotal;
                $item->save();
            }
            $order->save();
        });
        $this->info('finished ordering randomly');  
        Cache::put(
                     'all-orders',
                     Order::orderBy('created_at','desc')
                            ->get()
                            ->load('items', 'items.product'),
                     30 //minutes, schedule interval of this very task
                     );
    }
}
