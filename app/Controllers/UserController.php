<?php

		namespace App\Controllers;
		use App\Models\UserModel;

		class UserController extends BaseController
		{
			protected $member;

			function __construct()
			{
				helper('form');
				$this->validation = \Config\Services::validation();
				$this->member = new UserModel();
			}

			public function index()
			{
				$data['members'] = $this->member->findAll();
				return view('v_member', $data);
			}

			

			public function edit($id)
			{
				$data = $this->request->getPost();
				$validate = $this->validation->run($data, 'member');
				$errors = $this->validation->getErrors();

				if(!$errors){
					$dataForm = [
						// 'username' => $this->request->getPost('username'),
						'role' => $this->request->getPost('role'),
						'is_aktif' => $this->request->getPost('is_aktif'),
					];

                    // if($this->request->getPost('is_aktif')){
					// 	$dataForm['is_aktif'] = "1";
						             
					// }

					$this->member->update($id, $dataForm);

					return redirect('member')->with('success','Data Berhasil Diubah');
				}else{
					return redirect('member')->with('failed',implode("",$errors));
				}
				
			}

			public function delete($id)
			{
				$dataMember = $this->member->find($id);

				$this->member->delete($id);

				return redirect('member')->with('success','Data Berhasil Dihapus');
			}
		}