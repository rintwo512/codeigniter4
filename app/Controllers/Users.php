<?php namespace App\Controllers;
use App\Models\UsersModel;
class Users extends BaseController
{
	public function index()
	{
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
	}

    public function register()
    {
        $data = [];
        helper(['form']);
        if($this->request->getMethod() == 'post'){

            //validasi rules
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[3]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UsersModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'role' => 'admin',
                    'password' => $this->request->getVar('password'),
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Register Success');
               return redirect()->to('/');
            }
        }
        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
	//--------------------------------------------------------------------

}
