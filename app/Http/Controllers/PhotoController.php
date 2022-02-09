<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Entrepreneur;
use App\Models\User;
use App\Models\Venture;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class PhotoController extends Controller
{
    public function uploadPhotoProfile(Request $request){

        if($request->hasFile('photos')){

            $image_path = $request->file('photos')->getRealPath();

            $photo = Cloudder::upload($image_path, null, array("folder" => "inco-profiles", "overwrite" => TRUE, "resource_type" => "image"));

            $path = $photo->getResult();

            $data = array(
                'path_ONLINE'=>$path["url"],
                'path_LOCAL'=>$image_path,
                'status'=>'success'
            );

            $user = UserController::getAuthenticatedUser();
            $content = $user->getData();
            $id = $content->user->id;
            $user = User::where('id', $id)->first();
            if (is_null($user)) {
                return response()->json(['response' => 'The other user does not exist'], 400);
            }
            $user-> profile_picture = $path["url"];
            $user-> save();

            return response()->json($path,200);
        }else{
            return response()->json(['response' => 'Don´t is a photo'], 400);
        }
    }

    public function uploadPhotoInfluencer(Request $request){

        if($request->hasFile('photos')){

            $image_path = $request->file('photos')->getRealPath();

            $photo = Cloudder::upload($image_path, null, array("folder" => "inco-influencers", "overwrite" => TRUE, "resource_type" => "image"));

            $path = $photo->getResult();

            $data = array(
                'path_ONLINE'=>$path["url"],
                'path_LOCAL'=>$image_path,
                'status'=>'success'
            );

            $user = UserController::getAuthenticatedUser();
            $content = $user->getData();
            $id = $content->user->id;

            $user = User::where('id', $id)->first();
            if (is_null($user)) {
                return response()->json(['response' => 'The other user does not exist'], 400);
            }

            $influencer = Influencer::where('id_user', $id)->first();
            if (is_null($influencer)) {
                return response()->json(['response' => 'The other user does not exist'], 400);
            }
            $influencer-> photos = $path["url"];
            $influencer-> save();

            return response()->json($path ,200);
        }else{
            return response()->json(['response' => 'Don´t is a photo'], 400);
        }
    }

    public function uploadPhotoVenture(Request $request){

        if($request->hasFile('photos')){

            $image_path = $request->file('photos')->getRealPath();

            $photo = Cloudder::upload($image_path, null, array("folder" => "inco-influencers", "overwrite" => TRUE, "resource_type" => "image"));

            $path = $photo->getResult();

            $data = array(
                'path_ONLINE'=>$path["url"],
                'path_LOCAL'=>$image_path,
                'status'=>'success'
            );

            $user = UserController::getAuthenticatedUser();
            $content = $user->getData();
            $id = $content->user->id;

            $user = User::where('id', $id)->first();
            if (is_null($user)) {
                return response()->json(['response' => 'The other user does not exist'], 400);
            }

            $entrepreneur = Entrepreneur::where('id_user', $id)->first();
            if (is_null($entrepreneur)) {
                return response()->json(['response' => 'You do not an entrepreneur'], 400);
            }

            $id_venture = $request->id_venture;
            $venture = Venture::where('id', $id_venture)->first();
            if (is_null($venture )) {
                return response()->json(['response' => 'That Venture does not exist'], 400);
            }
            $venture-> venture_picture = $path["url"];
            $venture-> save();

            return response()->json($path ,200);
        }else{
            return response()->json(['response' => 'Don´t is a photo'], 400);
        }
    }

    public function uploadPhotoCompany(Request $request){

        if($request->hasFile('photos')){

            $image_path = $request->file('photos')->getRealPath();

            $photo = Cloudder::upload($image_path, null, array("folder" => "inco-influencers", "overwrite" => TRUE, "resource_type" => "image"));

            $path = $photo->getResult();

            $data = array(
                'path_ONLINE'=>$path["url"],
                'path_LOCAL'=>$image_path,
                'status'=>'success'
            );

            $user = UserController::getAuthenticatedUser();
            $content = $user->getData();
            $id = $content->user->id;

            $user = User::where('id', $id)->first();
            if (is_null($user)) {
                return response()->json(['response' => 'The other user does not exist'], 400);
            }

            $entrepreneur = Entrepreneur::where('id_user', $id)->first();
            if (is_null($entrepreneur)) {
                return response()->json(['response' => 'You do not an entrepreneur'], 400);
            }

            $id_company = $entrepreneur->id_company;
            $company = Company::where('id', $id_company)->first();
            if (is_null($company)) {
                return response()->json(['response' => 'That Company does not exist'], 400);
            }
            $company-> company_logo = $path["url"];
            $company-> save();

            return response()->json($path ,200);
        }else{
            return response()->json(['response' => 'Don´t is a photo'], 400);
        }
    }
}
