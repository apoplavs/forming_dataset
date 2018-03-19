<?php

use Illuminate\Database\Seeder;

class JusticeKindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	try {
			DB::table('justice_kinds')->insert([
				['justice_kind' => '1', 'name' => 'Цивільне'],
				['justice_kind' => '2', 'name' => 'Кримінальне'],
				['justice_kind' => '3', 'name' => 'Господарське'],
				['justice_kind' => '4', 'name' => 'Адміністративне'],
				['justice_kind' => '5', 'name' => 'Адмінправопорушення']
			]);
			$this->command->info('В justice_kinds дані успішно завантажені!');
		} catch (Exception $e) {
			$this->command->info('В justice_kinds не потрібно завантажувати дані!');
		}
		
    }
}
