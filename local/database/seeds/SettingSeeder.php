<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\SettingDescription;
use App\SettingEmail;
use App\SettingImage;
use App\SettingSocial;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $setting = Setting::create(array(
            'meta_keyword'		=> 'Shree Gyanmandir Namuna Secondary School',
            'meta_description'  => 'Shree Gyanmandir Namuna Secondary School',
            'email'         => 'purna.dangal@outlook.com',
            'item_perpage'      => 20,
            'description_limit'		=> 15,
            'latitude' => '27.776895',
            'longitude' => '85.712282',
            'current_year' => 2074,
            'result_type' => 2
        ));

         $setting_id = $setting->s_id;

         SettingDescription::create(array(
         	'setting_id' => $setting_id,
         	'language_id' => 1,
         	'meta_title' => 'Shree Gyanmandir Namuna Secondary School',
         	'name' => 'Shree Gyanmandir Namuna Secondary School'
         	
         ));

         SettingSocial::create(array(
         	'setting_id' => $setting_id
         ));

         SettingEmail::create(array(
         	'setting_id' => $setting_id,
         	'protocal' => 'mail'
         ));
         SettingImage::create(array(
         	'setting_id' => $setting_id

         ));
    }
}
