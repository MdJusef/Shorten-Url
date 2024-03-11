<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ShortLinkController extends Controller
{
    public function generateShortLink(Request $request){

        $validator = Validator::make($request->all(),[
            'real_link' => 'required|url',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $shortLink = new Shortlink();
        $shortLink->real_link = $request->real_link;
        $shortLink->short_code = Str::random(6);
        $shortLink->save();
    }

    public function getLink(){
        $shorlink = Shortlink::latest()->first();
        return response()->json([
            'short_link' => $shorlink,
        ]);
    }

    public function index(){
        return view('shortenlink');
    }
}
