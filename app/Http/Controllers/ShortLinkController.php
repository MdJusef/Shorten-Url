<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ShortLinkController extends Controller
{
//    public function generateShortLink(Request $request){
//
//        $request->validate([
//            'real_link' => 'required|url',
//        ]);
//
//        $shortLink = new Shortlink();
//        $shortLink->real_link = $request->real_link;
//        $shortLink->short_code = Str::random(6);
//        $shortLink->save();
//
//        return redirect('generate-shorten-link')->withSuccess('Generate Shorten Link Successfully');
//    }
//
//    public function index(){
//        $shortenLinks = Shortlink::latest()->get();
//        return view('shortenlink', compact('shortenLinks'));
//    }

    public function generateShortLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url', // Use 'url' for consistency
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $originalUrl = $request->input('url');

        // Check for existing short URL (optional optimization)
        $existingShortlink = Shortlink::where('real_link', $originalUrl)->first();
        if ($existingShortlink) {
            return response()->json([
                'message' => 'URL already shortened',
                'short_url' => route('shorten.link', $existingShortlink->short_code),
            ]);
        }

        $shortLink = new Shortlink();
        $shortLink->real_link = $originalUrl;
        $shortLink->short_code = Str::random(6); // Adjust length as needed
        $shortLink->save();

//        $shortUrl = route('shorten.link', $shortLink->short_code); // Use route helper

        return response()->json([
            'message' => 'Short URL generated successfully',
            'short_url' => $shortLink,
        ]);
    }

    public function index()
    {
        $shortlink = Shortlink::all();

        if (!$shortlink) {
            abort(404); // Handle non-existent shortcode
        }

//        return redirect()->away($shortlink->real_link);
        return response()->json([
            'data' => $shortlink,
        ]);
    }
}
