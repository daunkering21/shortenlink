<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Filter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShortenedLinks;
use App\Models\User;

class ShortenedLinksController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $parameter = [];
        foreach ($request->all() as $index => $d){
            $parameter[] = $index;
        }
        $rawData = collect(ShortenedLinks::where('username_id', $user->username)->get()->toArray());
        $data = Filter::filterAndPaginate($rawData, 15, $parameter, 'created_at');
        return view('dashboard.link.index',[
            'data' => $data,
            'username' => $user->username
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        if($user === null){
            $user = "Guest's";
        } else {
            $user = $user->username;
        }
        $randomStringVal = Str::random(8);
        $validatedData = $request->validate([
            'url' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'custom_url' => 'nullable'
        ]);
        if (stripos($validatedData['url'], 'https://') !== 0 && stripos($validatedData['url'], 'http://') !== 0) {
            $validatedData['url'] = 'https://' . $validatedData['url'];
        }
        if(!isset($validatedData['title'])) {
            $validatedData['title'] = null;
        }
        if(!isset($validatedData['description'])) {
            $validatedData['description'] = null;
        }
        if(!isset($validatedData['custom_url'])) {
            $validatedData['custom_url'] = $randomStringVal;
        }

        $insertData = [
            'username_id' => $user,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'original_url' => $validatedData['url'],
            'shortened_url' => $randomStringVal,
            'custom_url' => $validatedData['custom_url'],
            'tags' => 'default',
            'created_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
        $shortenedlink = env('DOMAIN').$insertData['custom_url'];
        try {
            ShortenedLinks::create($insertData);
            if($user === null){
                return redirect('/home')->with('success', 'Congratulations, your links is '. $shortenedlink);
            } elseif ($user!== null) {
                $user = auth()->user()->username;
                return redirect('/dashboard/link/'.$user)->with('success', 'Congratulations, your links is '. $shortenedlink);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'not success', 'error' => $e->getMessage()], 500);
        }
    }
    public function editCustomUrl($username, $custom_url)
    {
        $data = ShortenedLinks::where('username_id', $username)->where('custom_url', $custom_url)->firstOrFail();
        return view('dashboard.link.edit',[
            'data' => $data,
            'username' => $username
        ]);
    }
    public function update(Request $request, ShortenedLinks $shortenedLinks, $username, $custom_url)
    {
        $oldData = Shortenedlinks::where('username_id', $username)->where('custom_url',$custom_url)->firstOrFail();
        $validatedData = $request->validate([
            'url' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'custom_url' => 'nullable'
        ]);
        if (stripos($validatedData['url'], 'https://') !== 0 && stripos($validatedData['url'], 'http://') !== 0) {
            $validatedData['url'] = 'https://' . $validatedData['url'];
        }
        $insertData = [
            'username_id' => $username,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'original_url' => $validatedData['url'],
            'shortened_url' => $oldData['shortened_url'],
            'custom_url' => $validatedData['custom_url'],
            'tags' => 'default',
            'updated_at' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
        try {
            $shortenedLinks = $oldData;
            $shortenedLinks->update($insertData);
            return redirect('/dashboard/link/'.$username)->with('success', 'Your '.$custom_url.' has been updated to '. $insertData['custom_url']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'not success', 'error' => $e->getMessage()], 500);
        }
    }
    public function destroy($username, $custom_url)
    {
        $data = ShortenedLinks::where('username_id', $username)->where('custom_url', $custom_url)->firstOrFail();
        $data->delete();
        return redirect('dashboard/link/'.$username)->with('success', 'url has been deleted');
    }
    public function goToLink($shortenedUrl)
    {
        $link = ShortenedLinks::where('custom_url', $shortenedUrl)->firstOrFail();
        return redirect($link->original_url);
    }
    public function latest(Request $request)
    {
        $parameter = [];
        foreach ($request->all() as $index => $d){
            $parameter[] = $index;
        }
        $rawData = collect(ShortenedLinks::where('username_id', "Guest's")->get());
        $data = Filter::filterAndPaginate($rawData, 15, $parameter, 'created_at');
        return view('front.links',[
            'data' => $data
        ]);
    }
}
