<?php
namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Validator;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Passport\Client as OClient;
use GuzzleHttp\Client;
use App\Traits\AuthTokenResponses;

class AuthController extends BaseController
{
    use AuthTokenResponses;

  public function login(Request $request){

    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if( auth()->attempt($credentials) ){

      $user = Auth::user();
      // Let's update User status
      $user->last_login = date('Y-m-d H:i:s');
      $user->is_login = 1;
      $user->save();

      // Let's get user data as array
      $userArray = $user->toArray();
      $userArray['token'] = $this->get_user_token($user,"TestToken");
      $response = self::HTTP_OK;

      return $this->get_http_response( "success", $userArray, $response );

    } else {

      $error = "Unauthorized Access";

      $response = self::HTTP_UNAUTHORIZED;

      return $this->get_http_response( "Error", $error, $response );
    }

  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [

      'name' => 'required',
      'surname' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'password_confirmation' => 'required|same:password',

    ]);

    if ($validator->fails()) {

      return response()->json([ 'error'=> $validator->errors() ]);

    }

    $data = $request->all();
    $userExists = User::where('email',$data['email'])->first();
    if($userExists){
          return $this->get_http_response('error',"Email already exist", 404);
    }
    $data['password'] = Hash::make($data['password']);

    $user = User::create($data);
    // We know that General User have role id 2
    //$user->assignRole([2]);
    $userData =  $user->toArray();
    unset($userData['roles']);
    //$success = array();
    $userData['token'] = $this->get_user_token($user,"TestToken");
    $response =  self::HTTP_CREATED;

    return $this->get_http_response( "success", $userData, $response );

  }

  public function get_user_details_info()
  {

    $user = Auth::user();

    $response =  self::HTTP_OK;

    return $user ? $this->get_http_response( "success", $user, $response )
                   : $this->get_http_response( "Unauthenticated user", $user, $response );

  }



  public function get_user_token( $user, string $token_name = null ) {

     return $user->createToken($token_name)->accessToken;

  }

   /**
   * Logout user (Revoke the token)
   *
   * @return \Illuminate\Http\JsonResponse [string] message
   */
  public function logout()
  {
      $user = auth()->user();
      auth()->logout();
      event(new Logout('api', $user));

      $response =  self::HTTP_OK;

          return $user ? $this->get_http_response( "success", "Logout Successful", $response )
                         : $this->get_http_response( "Unauthenticated user", $user, $response );
  }


/**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Tymon\JWTAuth\Exceptions\JWTException
     */
    public function refresh(Request $request)
    {
        $site = ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];

        $refresh_token = $request->header('Refreshtoken');
        if($refresh_token){
            $oClient = OClient::where('password_client', 1)->first();

            $http = new Client;
            try {
                $response = $http->request('POST', $site.'/oauth/token', [
                    'form_params' => [
                        'grant_type' => 'refresh_token',
                        'refresh_token' => $refresh_token,
                        'client_id' => $oClient->id,
                        'client_secret' => $oClient->secret,
                        'scope' => '*',
                    ],
                ]);
                return json_decode((string) $response->getBody(), true);
            } catch (Exception $e) {
                return response()->json("unauthorized", 401);
            }
        }else{
            return $this->get_http_response('Error','Refreshtoken header not found', 400);
        }
    }

    public function updateProfile(Request $request){
        $user = auth()->user();
         $validator = Validator::make($request->all(), [
              'name' => 'required',
              'surname' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([ 'error'=> $validator->errors() ]);
            }

            $data = $request->all();
             $user->name = $data['name'];
             $user->surname = $data['surname'];

            if( isset($data['email'])){
                $userExists = User::where('email',$data['email'])->first();
                    if($userExists){
                          return $this->get_http_response('error',"Email already exist", 404);
                    }else{
                        $user->email = $data['email'];
                    }
            }

            if(isset($data['password'])){
                $user->password = Hash::make($data['password']);
            }

            if($user->save()){
                 return $this->get_http_response('success', "Profile updated successfully", 200);
            }else{
                 return $this->get_http_response('error', 'Error in updating profile', 400);
            }


    }
}
