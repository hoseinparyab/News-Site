<?php

namespace PYB\Advertising\Services;

use PYB\Advertising\Models\Advertising;

class AdvertisingService
{
 public  function  store($request,$imagePath,$imageName)
 {

     return Advertising::query()->create([
         'user_id' =>auth()->id(),
         'imagePath'=>$imagePath,
         'imageName' => $imageName ,
         'link' => $request->link,
         'title' => $request->title
     ]);
 }

 public function  update($request ,$id, $imagePath, $imageName)
 {

     return Advertising::query()->where('id',$id)->update([
         'imagePath' => $imagePath,
         'imagePath' => $imagePath,
         'link' => $request->link,
         'title' => $request->title,
         'location' => $request->location
     ]);
 }
}

