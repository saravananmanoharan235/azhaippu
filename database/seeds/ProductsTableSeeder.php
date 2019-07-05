<?php
use Illuminate\Database\Seeder;
use App\Products;
class ProductsTableSeeder extends Seeder
{
    
/**
     * Run the database seeds.
     *
     * @return void
     */
    
public function run()
    {
    	for ($i=0; $i <5000; $i++) { 
	    	$products=new Products();
	        $products->sku = 'P00'.rand();
	        $products->title = Str::random(100);
	        $products->description = Str::random(500); 
	        $products->price = rand();         
	        $products->save();
    	}
        /*DB::table('products')->insert([
            [
                'sku' => 'P0001',
                'title' => 'Hot Women Holiday Strappy Button Pocket Ladies Summer Beach Midi Swing Sun Dress',
                'description' => 'It is made of high quality materials,durable enought for your daily wearing. Stylish and fashion make you more attractive',
                'price' => 7.98,
            ],
            [
                'sku' => 'P0002',
                'title' => 'Womens Vintage Boho Long Maxi Evening Party Dress Summer Casual Beach Sundress',
                'description' => 'It is a Summer Must have and a statement piece that will turn heads. Beautiful and high quality dress,Full Length,  Chiffon Material',
                'price' => 7.95,
            ],
            [
                'sku' => 'P0003',
                'title' => 'Diamond Jewel 14K Gold Round Diamond Stud Earrings',
                'description' => 'The weight of a precious stone and easiest way to measure a diamond.One carat is equal to 200 miligrams.',
                'price' => 799,
            ],
            [
                'sku' => 'P0004',
                'title' => 'Diamond Jewel 14K Gold Round Diamond Stud Earrings',
                'description' => 'The weight of a precious stone and easiest way to measure a diamond.One carat is equal to 200 miligrams.',
                'price' => 799,
            ],
            [
                'sku' => 'P0005',
                'title' => 'J+S Premium Military Style Classic Aviator Sunglasses, Polarized, 100% UV protection',
                'description' => 'POLARIZED LENS, UV 400 PROTECTION, HIGH QUALITY FRAME, PERFECT ALL ROUNDER, 100% RISK FREE PURCHASE',
                'price' => 16.99,
            ],
        ]);*/
    }
}