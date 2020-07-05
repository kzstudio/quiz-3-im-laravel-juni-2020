<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArtikelModel{

	public static function get_all(){
		$items = DB::table('artikel')
				->select('artikel.*','user.username')
				->join('user', 'user.user_id', '=', 'artikel.user_id')
				->get();
		
		return $items;
    }
    
    public static function get_by_id($id){
		$items = DB::table('artikel')->where('artikel_id',$id)->first();
		
		return $items;
	}

	public static function save($data){
		$data['created_at'] = date('Y-m-d H:i:s');
		$new_items = DB::table('artikel')->insert($data);

		return $new_items;
	}

	public static function ubah($id, $data){
		$data['updated_at'] = date('Y-m-d H:i:s');
		$up_items = DB::table('artikel')->where('artikel_id',$id)->update($data);

		return $up_items;
	}

	public static function hapus($id){
		$del_items = DB::table('artikel')->where('artikel_id',$id)->delete();

		return $del_items;
	}
}