<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// нову категорію додавати в початок масиву
    	$categories = [
    	
//			['id' => '35', 'justice_kind' => '1', 'name' => ''],
//			['id' => '34', 'justice_kind' => '1', 'name' => ''],

    		['id' => '33', 'justice_kind' => '2', 'name' => 'інший документ'],
			['id' => '32', 'justice_kind' => '2', 'name' => 'рішення не вистояло в апеляції'],
			['id' => '31', 'justice_kind' => '2', 'name' => 'рішення вистояло в апеляції'],

			['id' => '30', 'justice_kind' => '1', 'name' => 'інший документ'],
			['id' => '29', 'justice_kind' => '1', 'name' => 'рішення не вистояло в апеляції'],
			['id' => '28', 'justice_kind' => '1', 'name' => 'рішення вистояло в апеляції'],

			['id' => '27', 'justice_kind' => '5', 'name' => 'інший документ'],
			['id' => '26', 'justice_kind' => '5', 'name' => 'рішення не вистояло в апеляції'],
			['id' => '25', 'justice_kind' => '5', 'name' => 'рішення вистояло в апеляції'],
		
			['id' => '24', 'justice_kind' => '2', 'name' => 'Інший вирок'],
			['id' => '23', 'justice_kind' => '2', 'name' => 'Особа звільнена від відповідальності'],
			['id' => '22', 'justice_kind' => '2', 'name' => 'Особу притягнено до відповідальності'],
			['id' => '21', 'justice_kind' => '2', 'name' => 'Інша ухвала'],
			['id' => '20', 'justice_kind' => '2', 'name' => 'Кінцеве рішення'],
			['id' => '19', 'justice_kind' => '2', 'name' => 'Відновлення провадження'],
			['id' => '18', 'justice_kind' => '2', 'name' => 'Зупинення провадження'],
			['id' => '17', 'justice_kind' => '2', 'name' => 'Початок провадження'],
		
			['id' => '16', 'justice_kind' => '1', 'name' => 'Інше рішення'],
			['id' => '15', 'justice_kind' => '1', 'name' => 'Відмовлено у задоволенні вимог позивача'],
			['id' => '14', 'justice_kind' => '1', 'name' => 'Справу вирішено іншим чином'],
			['id' => '13', 'justice_kind' => '1', 'name' => 'Задоволено вимоги позивача'],
			['id' => '12', 'justice_kind' => '1', 'name' => 'Інша ухвала'],
			['id' => '11', 'justice_kind' => '1', 'name' => 'Кінцеве рішення'],
			['id' => '10', 'justice_kind' => '1', 'name' => 'Відновлення провадження'],
			['id' => '9',  'justice_kind' => '1', 'name' => 'Зупинення провадження'],
			['id' => '8',  'justice_kind' => '1', 'name' => 'Початок провадження'],
		
			['id' => '7',  'justice_kind' => '5', 'name' => 'Інша постанова'],
			['id' => '6',  'justice_kind' => '5', 'name' => 'Особа звільнена від відповідальності'],
			['id' => '5',  'justice_kind' => '5', 'name' => 'На особу накладено стягнення'],
			['id' => '4',  'justice_kind' => '5', 'name' => 'Інша ухвала'],
			['id' => '3',  'justice_kind' => '5', 'name' => 'Відновлення провадження'],
			['id' => '2',  'justice_kind' => '5', 'name' => 'Зупинення провадження'],
			['id' => '1',  'justice_kind' => '5', 'name' => 'Початок провадження']
		];
    	
    	foreach($categories as $category) {
			try {
				DB::table('categories')->insert($category);
				$this->command->info('Категорія "'.$category['name'].'" успішно додана!');
			} catch (Exception $e) {
				break ;
			}
		}
    
		
    }
}
