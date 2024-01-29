<?php namespace App\Controllers;

// Load model
use App\Models\User_model;
// End load model

class Login extends BaseController
{
	public function index()
    {
        return view('login');
    }

	public function process()
	{
		$username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        // Lakukan proses login
        $model = new UserModel();
        $user = $model->login($username, $password);

        if ($user) {
            // Set session
            $session = session();
            $session->set('user_id', $user['id']);
            $session->set('username', $user['username']);
            // Redirect ke halaman dasbor atau halaman lainnya
            return redirect()->to(base_url('dashboard'));
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->to(base_url('login'))->with('error', 'Login failed. Invalid username or password.');
        }
	}

	// Logout
	public function logout()
	{
		$session = \Config\Services::session($config);
		$session->remove('username');
		$session->remove('akses_level');
		$session->remove('nama');
		$session->setFlashdata('sukses', 'Anda berhasil logout');
		return redirect()->to(base_url('login'));
	}

}	
