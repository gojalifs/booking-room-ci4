<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('user/index');
    }
    public function login()
    {
        helper(['form']);

        $request = service('request')->getMethod();

        if (!($request === 'post')) {
            return view('user/login');
        }
        $email = $this->request->getPost('email');
        $password = (string) $this->request->getPost('password');
        $session = session();
        $model = new UserModel();
        $login = $model->where('email', $email)->first();
        if ($login) {
            $pass = $login['password'];
            if (is_array($pass)) {
                $pass = $pass['password'];
            }

            if (password_verify($password, $pass)) {
                $login_data = [
                    'user_id' => $login['id'],
                    'user_name' => $login['name'],
                    'user_email' => $login['email'],
                    'logged_in' => TRUE,
                ];
                $session->set($login_data);
                return redirect()->to('dashboard');
            } else {
                $session->setFlashdata("errors", "Password salah.");
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata("errors", "Email tidak terdaftar.");
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    private function validateCredentials($email, $password)
    {
        $db = db_connect();

        // Query the 'pengguna' table to validate the credentials
        $query = $db->table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->get();

        $result = $query->getRow();

        // Check if a matching record is found
        if ($result !== null) {
            return true; // Valid credentials
        } else {
            return false; // Invalid credentials
        }
    }

    public function register()
    {
        helper(['form']);

        $request = service('request')->getMethod();

        if (!($request === 'post')) {
            return view('user/register');
        }

        $formData = $this->request;
        $name = $formData->getPost('name');
        $email = $formData->getPost('email');
        $password = (string) $formData->getPost('password');
        $passwordConfirmation = (string) $formData->getPost('password_confirmation');

        // Perform validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'password_confirmation' => 'required|matches[password]',
        ]);

        if (
            $validation->run([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $passwordConfirmation,
            ])
        ) {
            // Create a new instance of the userModel
            $userModel = new UserModel();

            // Prepare the data for insertion
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            // Insert the data into the database
            if ($userModel->insert($data)) {
                // Set the success flash message
                $session = session();
                $session->setFlashdata('success', 'Registration successful! You can now log in.');

                // Registration successful, redirect to login page or display success message
                return redirect()->to(base_url('login'));
            } else {
                // Failed to insert data, redirect to register page or display error message
                return redirect()->back()->with('error', 'Failed to register. Please try again.');
            }
        } else {
            // Validation failed, redirect back to the register page with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }
}