<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shorten;
class ShortenController extends Controller
{
    public function index()
    {
        return view('shortens.index', [
            'shortens' => Shorten::get(),
        ]);
    }

    public function detail()
    {
        return view('shortens.detail');
    }

    public function create()
    {
        return view('shortens.create');
    }

    public function store(Request $request)
    {

        $shorten = new Shorten();

        $shorten->title = $request->title;
        $shorten->url = $request->url;
        $shorten->custom = $request->custom;

        $shorten->save();

        return redirect()->route('shortens.index');
    }

    public function show($id)
    {
        return view('shortens.show', [
            'shorten' => Shorten::findOrFail($id),
        ]);
    }


    public function update(request $request, $id)
    {
        dd($id);
        $shorten = Shorten::findOrFail($id);

        $shorten->url = $request->url;
        $shorten->custom = $request->custom;

        $shorten->save();

        return redirect()->route('shortens.index');
    }

    public function destroy($id)
    {
        $shorten = Shorten::findOrFail($id);

        $shorten->delete();

        return redirect()->route('shortens.index');
    }


}
