<?php namespace App\Controllers;

class Courses extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/courses/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $Course = new \App\Models\Course();
   if($session->user_type == 'admin'){
      $data['courses'] = $Course->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'courses';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('courses/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/courses/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $Course = new \App\Models\Course();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'name'  => 'required|is_unique[courses.name]', 'code' => 'required|is_unique[courses.code]'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Course->save(['name' => $this->request->getVar('name'), 'code' => $this->request->getVar('code')]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully added."; 
    }
		
    
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'courses';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('courses/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($course_id){
    $Course = new \App\Models\Course();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'name'  => 'required', 'code' => 'required'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Course->update($course_id, ['name' => $this->request->getVar('name'), 'code' => $this->request->getVar('code')]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully updated."; 
    }
		


    $data['title'] = "Edit Course"; 
		$data['controller'] = 'courses';
    $data['page'] = 'edit';
    $data['course'] = $Course->find($course_id);


		echo view('shared/header', $data);
		echo view('courses/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($course_id){
    $Course = new \App\Models\Course();
    $Course->delete($course_id);
    return redirect()->to('/libraryapp/public/admin/courses')->with('success_message', 'Delete Successfully');
  }

	//--------------------------------------------------------------------

}
