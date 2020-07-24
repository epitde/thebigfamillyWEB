<?php

namespace App\Http\Controllers\API\Lang;

use Illuminate\Http\Request;

class TranslateController
{

    /**
     * Show the profile for the given user.
     *
     * @return
     */
    public function index()
    {
        $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
        $langDataEN = json_decode($jsonString, true);

        return view('admin.translate_en', ['langDataEN' => $langDataEN]);
    }
   

    public function germanIndex()
    {
        $jsonString = file_get_contents(base_path('resources/Applang/de.json'));
        $langDataDE = json_decode($jsonString, true);

        $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
        $langDataEN = json_decode($jsonString, true);

        return view('admin.translate_de', ['langDataDE' => $langDataDE], ['langDataEN' => $langDataEN]);
        
    }

    public function catalanIndex()
    {
        $jsonString = file_get_contents(base_path('resources/Applang/ca.json'));
        $langDataCA = json_decode($jsonString, true);

        $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
        $langDataEN = json_decode($jsonString, true);

        return view('admin.translate_ca', ['langDataCA' => $langDataCA], ['langDataEN' => $langDataEN]);
        
    }

    /**
     * Change Data in en.json.
     *
     * @return
     */
    public function changeDataEn(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/Applang/en.json'));
        $data = json_decode($jsonString, true);

        $data[$request->array_key][$request->key] = $request->value;

        $newJsonString = json_encode($data);
        file_put_contents(base_path('resources/Applang/en.json'), $newJsonString);
    }

    /**
     * Change Data in de.json.
     *
     * @return
     */
    public function changeDataDe(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/Applang/de.json'));
        $data = json_decode($jsonString, true);

        $data[$request->array_key][$request->key] = $request->value;

        $newJsonString = json_encode($data);
        file_put_contents(base_path('resources/Applang/de.json'), $newJsonString);
    }

    /**
     * Change Data in de.json.
     *
     * @return
     */
    public function changeDataCa(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/Applang/ca.json'));
        $data = json_decode($jsonString, true);

        $data[$request->array_key][$request->key] = $request->value;

        $newJsonString = json_encode($data);
        file_put_contents(base_path('resources/Applang/ca.json'), $newJsonString);
    }

    public function getLangAvailable(Request $request){
        
        return json_encode([
            ['name'=>'Catalan','code'=>'ca'],
            ['name'=>'English','code'=>'en'],
            ['name'=>'German','code'=>'de']
            
            
        ]);
      
    }

    public function getTranslate(Request $request){
        $jsonString = file_get_contents(base_path('resources/Applang/'.$request->id.'.json')); 
        return $jsonString;
      
    }
}


