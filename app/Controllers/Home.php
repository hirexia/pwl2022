<?php

		namespace App\Controllers;
		use App\Models\ProdukModel;

		class Home extends BaseController
		{
			public function index()
			{
				$produkModel = new ProdukModel(); 
				$produk = $produkModel->findAll();
				$data['produks'] = $produk;
				
				return view('v_home', $data);
			} 
		}