<?php namespace App\Controllers;

class Books extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/books/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $Book = new \App\Models\Book();
   if($session->user_type == 'admin'){
      $data['books'] = $Book->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'books';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('books/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/books/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $Book = new \App\Models\Book();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 
      'isbn'  => 'required|is_unique[books.isbn]',
      'name' => 'required',
      'description' => 'required',
      'date_published' => 'required',
      'copies' => 'required'
    ];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Book->save([
        'isbn' => $this->request->getVar('isbn'), 
        'name' => $this->request->getVar('name'),
        'description' => $this->request->getVar('description'),
        'date_published' => $this->request->getVar('date_published'),
        'copies' => $this->request->getVar('copies')
      ]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully added."; 
    }
		
    
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'books';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('books/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($book_id){
    $Book = new \App\Models\Book();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [
      'isbn'  => 'required',
      'name' => 'required',
      'description' => 'required',
      'date_published' => 'required',
      'copies' => 'required'
    ];
		if($request_method == 'post' && $this->validate($required_fields)){
      $Book->update($book_id, [
        'isbn' => $this->request->getVar('isbn'), 
        'name' => $this->request->getVar('name'),
        'description' => $this->request->getVar('description'),
        'date_published' => $this->request->getVar('date_published'),
        'copies' => $this->request->getVar('copies')
      ]);
      $data['success_message'] = "{$this->request->getVar('name')} has been successfully updated."; 
    }
		


    $data['title'] = "Edit Book"; 
		$data['controller'] = 'books';
    $data['page'] = 'edit';
    $data['book'] = $Book->find($book_id);


		echo view('shared/header', $data);
		echo view('books/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($book_id){
    $Book = new \App\Models\Book();
    $Book->delete($book_id);
    return redirect()->to('/libraryapp/public/admin/books')->with('success_message', 'Delete Successfully');
  }

	//--------------------------------------------------------------------

}
