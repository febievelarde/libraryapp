<?php namespace App\Controllers;

class Admins extends BaseController
{
	public function login($page = 'login')
	{
		if ( ! is_file(APPPATH.'/Views/admins/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}


		helper('form');
    $User = new \App\Models\User();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'username'  => 'required', 'password' => 'required'];
		if($request_method == 'post' && $this->validate($required_fields)){

      $user = $User->where('username', $this->request->getVar('username'))->first();
			if(!is_null($user) && password_verify($this->request->getVar('password'), $user['password'])){
				$session = session();
				$session->set(['logged_in_id' => $user['id'], 'user_type' => $user['user_type'], 'logged_in' => TRUE ]);
        return redirect()->to('/libraryapp/public/')->with('success_message', "Login Successfully");
      }else{
        $data['error_message'] = "Incorrect username or password";
			}
			
		}
		

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'admins';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('admins/'.$page, $data);
		echo view('shared/footer', $data);
	}

	public function logout(){
    $session = session();
    $session->remove(['logged_in_id', 'logged_in']);
    return redirect()->to('/libraryapp/public/')->with('success_message', "Logout Successfully");
  }
  

	//--------------------------------------------------------------------

}
