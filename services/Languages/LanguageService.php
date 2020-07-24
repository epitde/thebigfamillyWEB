<?php

namespace services\Languages;

use App\Models\Language;

class LanguageService
{
    protected $language;

    public function __construct()
    {
        $this->language = new Language();
    }

    /**
     * Get all languages from database
     */
    public function getAllLanguages()
    {
        return $this->language->all();
    }

    /**
     * Get a single language from database
     */
    public function get($id)
    {
        return $this->language->find($id);
    }

    /**
     * Create language object and save in database
     */
    public function create($data)
    {
        return $this->language->create($data);
    }

    /**
     * Delete language object from database
     */
    public function delete($id)
    {
        $language = $this->get($id);

        $language->delete();
    }

    public function createJsonFile(Language $language)
    {
        //create array for json file
        $data = [
            'GENERAL' => [
                "ads" => "",
                "categories" => "",
                "recommended" => "",
                "services" => "",
                "orgnisation" => "",
                "new_post" => ""
            ],
            'HOME' => [
                "title" => "",
                "greeting" => ""
            ],
            'LOGIN' => [
                "login" => "",
                "user_type" => "",
                "personal" => "",
                "organization" => "",
                "register" => "",
                "email" => "",
                "password" => "",
                "sign_up" => "",
                "dont_have_a_account" => "",
                "registration" => "",
                "name" => "",
                "surname" => "",
                "confirm_password" => "",
                "check_to_process_registration" => "",
                "already_have_an_account" => ""
            ],
            'POST' => [
                "login" => "",
                "user_type" => "",
                "personal" => "",
                "organization" => "",
                "categories" => "",
                "search_for_anything" => "",
                "search_for_location" => "",
                "post_ads" => ""
            ]
        ];

        //convert array to json
        $json_data = json_encode($data);

        $file = $language->short_code . '.json';
        $destinationPath = base_path('resources/Applang');

        File::put($destinationPath . $file, $json_data);
    }
}
