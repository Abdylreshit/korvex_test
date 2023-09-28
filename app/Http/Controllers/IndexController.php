<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        $links = Link::get();

        return view('welcome', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $token = Str::random(10);

        Link::create([
            'url' => $request->url,
            'token' => "{$token}",
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function redir($token)
    {
        $link = Link::query()->actual()->where('token', $token)->firstOrFail();

        return redirect($link->url);
    }
}
