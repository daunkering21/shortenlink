<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Filter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ShortenedLinks;

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
        if(stripos($request->url, 'lovilink') !== false) {
            return redirect('/dashboard/link/'.$user)->with('error', "Cannot do this");
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
            if($user === "Guest's"){
                return redirect('/home')->with('copy', 'Congratulations, your links is '. $shortenedlink);
            } elseif ($user!== "Guest's") {
                $user = auth()->user()->username;
                return redirect('/dashboard/link/'.$user)->with('copy', 'Congratulations, your links is '. $shortenedlink);
            }
        } catch (\Exception $e) {
             if($user === "Guest's"){
                return redirect('/home')->with('error', 'Please contact lovidea-support@lovilink.com');
            } elseif ($user!== "Guest's") {
                $user = auth()->user()->username;
                return redirect('/dashboard/link/'.$user)->with('copy', 'Congratulations, your links is '. $shortenedlink);
            }
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
        // dd(session('password_verified'));
        if (str_starts_with($shortenedUrl, 'bkp')) {
            if (!session('password_verified')) {
                session(['shortened_url' => $shortenedUrl]);
    
                return view('dashboard.lock.password', [
                    'url' => $shortenedUrl,
                ]);
                // echo "<form method='POST' action='/validate-password' style='text-align: center; margin-top: 50px;'>";
                // echo "<input type='hidden' name='_token' value='" . csrf_token() . "'>";
                // echo "<h2>Protected Link</h2>";
                // echo "<label for='password'>Enter Password:</label><br>";
                // echo "<input type='password' id='password' name='password' required><br><br>";
                // echo "<input type='hidden' name='url' value='" . $shortenedUrl . "'><br><br>";
                // echo "<button type='submit'>Submit</button>";
                // echo "</form>";
                // exit();
            } else {
                session()->forget(['password_verified', 'shortened_url']);
            }
        }

        $link = ShortenedLinks::where('custom_url', $shortenedUrl)->firstOrFail();
        $link->increment('total_click');

        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
        header('Expires: 0');

        header("Location: " . $link->original_url, true, 301);
        exit();
    }
    public function pass(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $correctPassword = env('PASSWORD'); 
        if ($request->password === $correctPassword) {
            session(['password_verified' => true]);
            return redirect('/'.$request->url);
        } else {
            return redirect()->back()->withErrors(['password' => 'Incorrect password!']);
        }
    }
    public function latest(Request $request)
    {
        $parameter = [];
        foreach ($request->all() as $index => $d){
            if($index !== 'page_count') {
                $parameter[] = $index;
            }
        }
        $rawData = collect(ShortenedLinks::where('username_id', "Guest's")->get());
        $data = Filter::filterAndPaginate($rawData, 15, $parameter, 'created_at');
        return view('front.links',[
            'data' => $data
        ]);
    }
}