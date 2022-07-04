<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

class ImageService 
{
    function getAvatar(Request $request)
    {
        $req = $request->request->all();
        $avatar = $request->files->get("avatar");
        $avatar = fopen($avatar->getRealPath(),"rb");
        $req["avatar"] = $avatar;
        return $avatar;
    }

}