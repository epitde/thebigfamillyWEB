<?php

namespace services\Languages;

use App\Models\Language;
use services\facade\MailFacade;

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

    public function getByShortCode($short_code)
    {
        return $this->language->where('short_code', $short_code)->first();
    }

    public function makeLanguage($data)
    {
        $language = $this->create($data);

        $this->createJsonFile($language);

        if ($language->user_id) {
            MailFacade::sendRequestToTranslator($language, $data);
        }

        return $language;
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
        $destinationPath = base_path('resources\Applang');

        file_put_contents($destinationPath . '/' . $file, $json_data);
    }

    public function updateLanguage($data)
    {
        $language = $this->get($data['id']);

        if ($data['user_id'] && $language->user_id != $data['user_id']) {
            MailFacade::sendRequestToTranslator($language, $data);
        }

        $this->update($language, $data);
    }

    public function update(Language $language, array $data)
    {
        //Update object with given data
        return $language->update($this->edit($language, $data));
    }

    protected function edit(Language $language, $data)
    {
        //convert object attributes to array and merge with updated array
        return array_merge($language->toArray(), $data);
    }

    public function deleteLanguage($id)
    {
        $language = $this->get($id);

        $file = $language->short_code . '.json';
        $destinationPath = base_path('resources\Applang');

        unlink($destinationPath . '/' . $file);

        $language->delete();
    }
}
