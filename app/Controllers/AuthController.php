<?php

		namespace App\Controllers;
		use App\Models\userModel;

		class AuthController extends BaseController
		{
		    protected $user;

		    function __construct()
		    {
		        helper('form');
				
				$this->validation = \Config\Services::validation();
		        $this->user = new userModel();
		    }

		    public function login()
		    {
		        if ($this->request->getPost('username')!=0) {
		            $username = $this->request->getVar('username');
		            $password = $this->request->getVar('password');
					$is_aktif = $this->request->getVar('is_aktif');

					$dataUser = $this->user->where(['username' => $username])->first();

		            if ($dataUser) {
		                if (md5($password) == $dataUser['password']) {
							if($dataUser['is_aktif'] != 0) {
								session()->set([
									'username' => $dataUser['username'],
									'role' => $dataUser['role'],
									'isLoggedIn' => TRUE
								]);

								return redirect()->to(base_url('/'));
							} else {
								session()->setFlashdata('failed', 'Akun belum aktif, silahkan hubungi admin');
								return redirect()->back();
							}

		                } else {
		                    session()->setFlashdata('failed', 'Username & Password Salah');
		                    return redirect()->back();
		                }
		            } else {
							session()->setFlashdata('failed', 'Username Tidak Ditemukan');
							return redirect()->back();
		            }
		        } else if ($this->request->getPost('uname')){
					//register dsini
					$registrar = $this->request->getPost();
					$validate = $this->validation->run($registrar, 'user');
					$errors = $this->validation->getErrors();

					if(!$errors) {
						$registrarForm = [ 
							'username' => $this->request->getPost('uname'),
							'password' => md5($this->request->getPost('passw')),
							'role'	   => "user",
						];					
				
						$this->user->insert($registrarForm); 

						session()->setFlashdata('success', 'Menunggu verifikasi admin');
						return redirect()->back();
					} else {
						session()->setFlashdata('failed',implode("<br>",$errors));
						return redirect()->back();
					}

				} else {
		            return view('login_view');
		        }
		    }

		    public function logout()
		    {
		        session()->destroy();
		        return redirect()->to('login');
		    }

			// public function create()
			// {
			// 	$data = $this->request->getPost();
			// 	$validate = $this->validation->run($data, 'user');
			// 	$errors = $this->validation->getErrors();

			// 	if(!$errors){
			// 		$dataForm = [ 
			// 			'username' => $this->request->getPost('uname'),
			// 			'password' => password_hash($this->request->getPost('passw'), PASSWORD_DEFAULT),
			// 		];
			
			
			// 		$this->produk->insert($dataForm); 
			
			// 		return redirect('login')->with('success','Menunggu verifikasi admin');
			// 	}else{
			// 		return redirect('login')->with('failed',implode("<br>",$errors));
			// 	}    
			// }
		}

?>