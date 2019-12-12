<?php namespace App\Controllers;

class Students extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/students/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $Student = new \App\Models\Student();
   if($session->user_type == 'admin'){
      $data['students'] = $Student->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'students';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('students/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/students/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $Student = new \App\Models\Student();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 
        'student_id'  => 'required|is_unique[students.student_id]', 
        'name' => 'required',
        'course_id' => 'required',
        'course_year_id' => 'required'
    ];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Student->save([
        'student_id' => $this->request->getVar('student_id'),
        'name' => $this->request->getVar('name'), 
        'course_id' => $this->request->getVar('course_id'),
        'course_year_id' => $this->request->getVar('course_year_id')
      ]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully added."; 
    }
		
    $Course = new \App\Models\Course();
    $CourseYear = new \App\Models\CourseYear();
    
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'students';
    $data['page'] = $page;
    $data['courses'] = $Course->findAll();
    $data['course_years'] = $CourseYear->findAll();


		echo view('shared/header', $data);
		echo view('students/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($studentid){
    $Student = new \App\Models\Student();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [
      'student_id'  => 'required', 
      'name' => 'required',
      'course_id' => 'required',
      'course_year_id' => 'required'
    ];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Student->update($studentid, [
        'student_id' => $this->request->getVar('student_id'),
        'name' => $this->request->getVar('name'), 
        'course_id' => $this->request->getVar('course_id'),
        'course_year_id' => $this->request->getVar('course_year_id')
      ]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully updated."; 
    }
		

    $Course = new \App\Models\Course();
    $CourseYear = new \App\Models\CourseYear();

    $data['title'] = "Edit Student"; 
		$data['controller'] = 'students';
    $data['page'] = 'edit';
    $data['student'] = $Student->find($studentid);
    $data['courses'] = $Course->findAll();
    $data['course_years'] = $CourseYear->findAll();


		echo view('shared/header', $data);
		echo view('students/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($student_id){
    $Student = new \App\Models\Student();
    $Student->delete($student_id);
    return redirect()->to('/libraryapp/public/admin/students')->with('success_message', 'Delete Successfully');
  }

	//--------------------------------------------------------------------

}
