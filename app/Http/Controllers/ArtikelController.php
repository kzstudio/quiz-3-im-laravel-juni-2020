<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;

class ArtikelController extends Controller
{
    public function admin(){
        $items = ArtikelModel::get_all();

        return view('artikel.index',compact('items'));
    }

    public function create(){
        return view('artikel.tambah');
    }

    public function edit($id){
        $items = ArtikelModel::get_by_id($id);
        $items->isi = trim($items->isi);
        return view('artikel.ubah',compact('items'));
    }

    public function show($id){
        $items = ArtikelModel::get_by_id($id);

        return view('artikel.lihat',compact('items'));
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = 1;
        $data['slug'] = str_replace(' ','-',strtolower($data['judul']));
        $data['tag'] = empty($data['tag'])?' ':$data['tag'];
        ArtikelModel::save($data);

        return redirect('/artikel');
    }

    public function update($id, Request $request){
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $data['slug'] = str_replace(' ','-',strtolower($data['judul']));
        $data['tag'] = empty($data['tag'])?' ':$data['tag'];
        

        ArtikelModel::ubah($id, $data);

        return redirect('/artikel');
    }

    public function destroy($id){
       
        ArtikelModel::hapus($id);

        return redirect('/artikel');
    }
}
