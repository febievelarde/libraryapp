<?php namespace App\Controllers;

class Fines extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/fines/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $Fine = new \App\Models\Fine();
   if($session->user_type == 'admin'){
      $data['fines'] = $Fine->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'fines';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('fines/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/fines/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $Fine = new \App\Models\Fine();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'quantity'  => 'required', 'fines' => 'required'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Fine->save(['quantity' => $this->request->getVar('quantity'), 'fines' => $this->request->getVar('fines')]);
      $data['success_message'] = "Fines successfully created."; 
    }
		
    
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'fines';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('fines/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($fine_id){
    $Fine = new \App\Models\Fine();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields =  [ 'quantity'  => 'required', 'fines' => 'required'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Fine->update($fine_id,['quantity' => $this->request->getVar('quantity'), 'fines' => $this->request->getVar('fines')]);
      $data['success_message'] = "Fines successfully updated.";  
    }
		


    $data['title'] = "Edit Fine"; 
		$data['controller'] = 'fines';
    $data['page'] = 'edit';
    $data['fine'] = $Fine->find($fine_id);


		echo view('shared/header', $data);
		echo view('fines/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($fine_id){
    $Fine = new \App\Models\Fine();
    $Fine->delete($fine_id);
    return redirect()->to('/libraryapp/public/admin/fines')->with('success_message', 'Delete Successfully');
  }

	//--------------------------------------------------------------------

}
