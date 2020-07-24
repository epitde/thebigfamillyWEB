<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\CategoryUser;
use App\Models\GeneralProfile;
use App\Models\OrganizationProfile;
use App\Models\SubcategoryUser;
use Illuminate\Http\Request;
use Validator;
class UserController extends BaseController
{
    //

    public function getCategoryUser(Request $request){
        $userType = $request->get('type');

        if($userType){
            $userCategories = CategoryUser::where('type',$userType)->get()->toArray();
            $userCategories = $userCategories ? $userCategories : [];
            return $this->get_http_response('success', $userCategories, 200);
        }else{
            return $this->get_http_response("error", "type key is required", 404);
        }

    }

    public function getSubCategoryUser(Request $request){
        $userType = $request->get('type');

        if($userType){
            $userCategories = SubcategoryUser::where('type',$userType)->get()->toArray();
            $userCategories = $userCategories ? $userCategories : [];
            return $this->get_http_response('success', $userCategories, 200);
        }else{
            return $this->get_http_response("error", "type key is required", 404);
        }

    }

    public function createOrganizationProfile(Request $request){

        $validator =  Validator::make($request->all(),[
            'category_user_id' => 'required',
            'subcategory_user_id' => 'required',
            'name' => 'required',
            'responsible' => 'required',
            'main_phone' => 'required',
            'main_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'digitally_identified_user' => 'required',
            'alternative_identified_user' => 'required',
            'user_id'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all();

        $result = OrganizationProfile::create($data);

        if($result){
            return $this->get_http_response('success', "Organization profile created successfully", 200);
        }else{
            return $this->get_http_response('error', 'Error in creating organization profile', 400);
        }

    }

    public function updateOrganizationProfile(Request $request){

        $validator =  Validator::make($request->all(),[
            'id' => 'required',
            'category_user_id' => 'required',
            'subcategory_user_id' => 'required',
            'name' => 'required',
            'responsible' => 'required',
            'main_phone' => 'required',
            'main_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'digitally_identified_user' => 'required',
            'alternative_identified_user' => 'required',
            'user_id'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all();
        $result = OrganizationProfile::where('id', $data['id'])->update($data);

        if ($result) {
                return $this->get_http_response('success', "Organization profile updated successfully", 200);
        } else {
                return $this->get_http_response('error', 'Error in updating organization profile', 400);
        }


    }

    public function createGeneralProfile(Request $request){
        $validator =  Validator::make($request->all(),[
            'category_user_id' => 'required',
            'subcategory_user_id' => 'required',
            'name' => 'required',
            'main_phone' => 'required',
            'main_address' => 'required',
            'digitally_identified_user' => 'required',
            'alternative_identified_user' => 'required',
            'user_id'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all();

        $result = GeneralProfile::create($data);

        if($result){
            return $this->get_http_response('success', "Profile created successfully", 200);
        }else{
            return $this->get_http_response('error', 'Error in creating profile', 400);
        }
    }

    public function updateGeneralProfile(Request $request){
        $validator =  Validator::make($request->all(),[
            'id' => 'required',
            'category_user_id' => 'required',
            'subcategory_user_id' => 'required',
            'name' => 'required',
            'main_phone' => 'required',
            'main_address' => 'required',
            'digitally_identified_user' => 'required',
            'alternative_identified_user' => 'required',
            'user_id'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all();

        $result = GeneralProfile::where('id',$data['id'])->update($data);

        if($result){
            return $this->get_http_response('success', " Profile updated successfully", 200);
        }else{
            return $this->get_http_response('error', 'Error in updating profile', 400);
        }
    }
}
