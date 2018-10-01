<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
class ImagesController extends Controller
{
    public function user_avatar($id,$size){


	// $img= json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large;
$user=User::findOrFail($id);


	if(is_null($user->avatar)){
		$img=Image::make('https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png')->fit($size)->response('jpg',90);
	}else if(strpos($user->avatar,'http')!==false)
	{	
		$img=Image::make($user->avatar)->fit($size)->response('jpg',90);
	}else
	{

    	$avatar_path=asset('storage/users/' . $id . '/avatars/' . $user->avatar);
    	$img=Image::make($avatar_path)->fit($size)->response('jpg',90);
	}
	
    	

    	return $img;
    }
}
