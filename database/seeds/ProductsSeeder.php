<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$titles = array("ნოხი 60x90 სმ 6501019", "ფეხსაცმლის კომოდი 65x100x25 სმ 3676780", "სავარძელი 100 სმ 3808003", "ტანსაცმლის საკიდი 83x93/168x43 სმ 3811216", "შემოსასვლელის კარადა სარკით 80x200x28 სმ 3676597", "ტანსაცმლის საკიდი 5ც 4977500", "საოფისე მაგიდა 100x75x40 სმ 3681461", "ჭაღი TORSTEIN 56x40x35სმ შავი მეტ 4911217", "საშობაო ხე 30სმ 20 ნათურით 12/1 6024500", "საშობაო მანათობელი ხე 128 ნათურით 86სმ 4/1 6024600",  "საშობაო კიბე ელფებით 115სმ პოლ 16/1 6051300", "საშობაო განათება FYLGJER 10 ნათურა მწვანე PVC 12/1 6070700", "საშობაო სანტა თხილამურებით 5602500", "საშობაო სანტა კლაუსი 5694200", "საშობაო ირემი ციგით ნათურით თეთრი 6084800", "საშობაო ელფი პოლ/მეტალი 115სმ 8/1 5660000");
    	$prices = array('34,95 ₾ 69,90 ₾', '137,40 ₾ 229,00 ₾', '143,40 ₾ 239,00 ₾', '47,40 ₾ 79,00 ₾', '164,50 ₾ 329,00 ₾', '3,45 ₾ 6,90 ₾', '69,50 ₾ 139,00 ₾', '89,95 ₾ 179,90 ₾', '12,45 ₾ 24,90 ₾', '49,95 ₾ 99,90 ₾', '17,95 ₾ 35,90 ₾', '12,95 ₾ 25,90 ₾', '24,95 ₾ 49,90 ₾', '89,95 ₾ 179,90 ₾', '114,95 ₾ 229,90 ₾', '39,95 ₾ 79,90 ₾');
    	$descriptions = array( "", "", "", "", "", "", "მარაგი გადაამოწმეთ ფილიალებში", "", "", "", "", "", "ზომა 41სმ", "ზომა 80სმ", "ზომა 34x65x125სმ", ""); 
    	$categories_id = array( 5, 3, 3, 3, 3, 6, 3, 6, 1, 1, 1, 1, 1, 1, 1, 1);
    	$images = array('noxi.png',  'fexsacmlis_komodi.png', 'savardzeli.png', 'tansacmlis_sakidi.png', 'shemosasvleli_karada_sarkit.png', 'tansacmlis_sakidi_5cali.png', 'saofise_magida.png', 'chaghi.png', 'sashobao_xe_naturit.png', 'sashobao_manatobeli_xe.png', 'sashobao_kibe_elfebit.png', 'sashobao_ganateba.png', 'sashobao_santa_txilamurebit.png', 'sashobao_santa_klausi.png', 'sashobao_iremi_cigit.png', 'sashobao_elfi.png');

    	for ($i=0; $i < 16; $i++) { 
    		DB::table('products')->insert([
		        'title' => $titles[$i],
		        'price' => $prices[$i],
		        'description' => $descriptions[$i],
		        'category_id' => $categories_id[$i],
		        'image' => $images[$i]
			    ]);
    	}
    }
}
