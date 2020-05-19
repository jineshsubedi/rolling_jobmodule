<?php namespace App\library;
use App\Setting;
   
    class Settings {

    

     public static function getSettings()
     {
        return Setting::first();
     }

     

     public static function getImages()
     {
        $setting = Setting::first();
        return \App\SettingImage::where('setting_id', $setting->id)->first();
     }

     public static function getEmails(){
        $setting = Setting::first();
        return \App\SettingEmail::where('setting_id', $setting->id)->first();
     }
     public static function getSocials()
     {
        $setting = Setting::first();
        return \App\SettingSocial::where('setting_id', $setting->id)->first();
     }

     public static function getLimitedWords($text,$startword,$numberOfWords)
                {
                if($text != null)
                    {
                        //$text = strip_tags($text);
                    $textArray = explode(" ", $text);
                    if(count($textArray) > $numberOfWords)
                        {
                        return implode(" ",array_slice($textArray, $startword, $numberOfWords)).' ... ';
                        }
                    return $text;
                    }
                return "";
                }

     

    }

?>