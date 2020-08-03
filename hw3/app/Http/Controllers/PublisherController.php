<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = DB::table('publishers')->orderBy('id')->get();

        return view('publisher.index', compact('publishers'));
    }

    public function create()
    {
        return view('publisher.create');
    }

    public function store(Request $request)
    {
        $request->validate(['publisher-name' => 'required']);
        $name = $request->input("publisher-name");

        DB::table('publishers')->insert(['publisher_name' => $name]);

        return redirect('/publisher');
    }

    public function edit($publisher_id)
    {
        $publisher = DB::table('publishers')->where('id', $publisher_id)->first()->publisher_name;
        $olddata = ['publisher_id' => $publisher_id, 'publisher_name' => $publisher];

        return view('publisher.edit', compact('olddata'));
    }

    public function update(Request $request)
    {
        $request->validate(['publisher-name' => 'required']);

        $name = $request->input("publisher-name");

        DB::table('publishers')
            ->where('id', $request->input('id'))
            ->update(['publisher_name' => $name]);

        return redirect('/publisher');
    }

    public function delete($publisher_id)
    {
        DB::table('publishers')->where('id', $publisher_id)->delete();
        DB::table('books')->where('publisher_id', $publisher_id)->delete();

        return redirect('/publisher');
    }
}
