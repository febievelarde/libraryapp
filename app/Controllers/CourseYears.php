<?php namespace App\Controllers;

class CourseYears extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/course_years/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $CourseYear = new \App\Models\CourseYear();
   if($session->user_type == 'admin'){
      $data['course_years'] = $CourseYear->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'course_years';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('course_years/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/course_years/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $CourseYear = new \App\Models\CourseYear();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'name'  => 'required|is_unique[course_years.name]', 'slug' => 'required|is_unique[course_years.slug]'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $CourseYear->save(['name' => $this->request->getVar('name'), 'slug' => $this->request->getVar('slug')]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully added."; 
    }
		
    
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'course_years';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('course_years/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($course_year_id){
    $CourseYear = new \App\Models\CourseYear();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 'name'  => 'required', 'slug' => 'required'];
		if($request_method == 'post' && $this->validate($required_fields)){
      $CourseYear->update($course_year_id, ['name' => $this->request->getVar('name'), 'slug' => $this->request->getVar('slug')]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully updated."; 
    }
		


    $data['title'] = "Edit Course Year"; 
		$data['controller'] = 'course_years';
    $data['page'] = 'edit';
    $data['course_year'] = $CourseYear->find($course_year_id);


		echo view('shared/header', $data);
		echo view('course_years/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($course_year_id){
    $CourseYear = new \App\Models\CourseYear();
    $CourseYear->delete($course_year_id);
    return redirect()->to('/libraryapp/public/admin/course_years')->with('success_message', 'Delete Successfully');
  }

	//--------------------------------------------------------------------

}
