<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publishers = \App\Publisher::orderBy('id')->get();

        return view('publisher.index', compact('publishers'));
    }

    public function create()
    {
        return view('publisher.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['publisher_name' => 'required']);
        \App\Publisher::create($data);

        return redirect('/publisher');
    }

    public function edit($publisher_id)
    {
        $publisher = \App\Publisher::findOrFail($publisher_id)->publisher_name;
        $olddata = ['publisher_id' => $publisher_id, 'publisher_name' => $publisher];

        return view('publisher.edit', compact('olddata'));
    }

    public function update(Request $request)
    {
        $request->validate(['publisher-name' => 'required']);

        $name = $request->input("publisher-name");

        \App\Publisher::where('id', $request->input('id'))
            ->update(['publisher_name' => $name]);

        return redirect('/publisher');
    }

    public function delete($publisher_id)
    {
        \App\Book::where('publisher_id', $publisher_id)->delete();
        \App\Publisher::where('id', $publisher_id)->delete();

        return redirect('/publisher');
    }
}
