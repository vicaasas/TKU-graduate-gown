<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 預設歸還地點插入
         *
         */
        DB::table('configs')->insert([
            'key' => '歸還地點',
            'value' => '守謙會議中心 HC308',
        ]);
    }
}
