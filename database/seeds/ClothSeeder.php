<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 預設物品設定
         */
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '服',
            'property' => 'S',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '服',
            'property' => 'M',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '服',
            'property' => 'L',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '服',
            'property' => 'XL',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '領巾',
            'property' => '白',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '學士',
            'name' => '領巾',
            'property' => '藍',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '服',
            'property' => 'M',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '服',
            'property' => 'L',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '服',
            'property' => 'XL',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '白',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '黃',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '橘',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '灰',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '藍',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '碩士',
            'name' => '帽穗、披肩',
            'property' => '紫',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '博士',
            'name' => '服',
            'property' => 'S',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '博士',
            'name' => '服',
            'property' => 'M',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '博士',
            'name' => '服',
            'property' => 'L',
            'quantity' => '0',
        ]);
        DB::table('cloths')->insert([
            'type' => '博士',
            'name' => '服',
            'property' => 'XL',
            'quantity' => '0',
        ]);
    }
}
