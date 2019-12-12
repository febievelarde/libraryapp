<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/home/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
	 }

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'home';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('home/'.$page, $data);
		echo view('shared/footer', $data);
	}

	//--------------------------------------------------------------------

}
