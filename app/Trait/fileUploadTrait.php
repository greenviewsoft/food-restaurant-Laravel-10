<?php
namespace App\traits;

use Illuminate\Http\Request;

trait FileUploadTrait{

function uploadImage( Request $request,$inputName, $path = "/uploads")  {
    if($request->hasFile($inputName)){
    $image = $request->{$inputName};
    $ext = $image->getClientExtension();
    $imageName = 'media_'.uniqid().'.'.$ext; // .ext 

   $image->move(public_path($path));


   return $path.'/'.$imageName;


       }

    } // updateImages

}