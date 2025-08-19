<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function registerView()
    {
        if (session('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register');
    }

    public function loginView()
    {
        if (session('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function register()
    {
        $rules = [
            'email'            => 'required|valid_email|is_unique[users.email]',
            'username'         => 'permit_empty|min_length[3]|max_length[50]',
            'password'         => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->save([
            'email'         => $this->request->getPost('email'),
            'username'      => $this->request->getPost('username'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user      = $userModel->where('email', $this->request->getPost('email'))->first();

        if (! $user || ! password_verify($this->request->getPost('password'), $user['password_hash'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        // Regenerate session ID to prevent fixation
        $session = session();
        $session->regenerate();

        $session->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'user_email' => $user['email'],
            'username'   => $user['username'],
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
