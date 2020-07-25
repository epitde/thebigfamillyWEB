<?php

use Illuminate\Database\Seeder;
use services\facade\LanguageFacade;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            ['name' => 'English', 'short_code' => 'en']
        ];

        foreach ($array as $data) {
            $language = LanguageFacade::getByShortCode($data['short_code']);

            if ($language) {
                LanguageFacade::update($language, $data);
            } else {
                $language = LanguageFacade::makeLanguage($data);
            }
        }
    }
}
