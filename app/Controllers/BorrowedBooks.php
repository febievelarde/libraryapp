<?php namespace App\Controllers;

class BorrowedBooks extends BaseController
{
	public function index($page = 'index')
	{
		
		if ( ! is_file(APPPATH.'/Views/borrowed_books/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

			
	 $session = session();
	 if($session->getFlashdata('success_message')){
		$data['success_message'] = $session->getFlashdata('success_message');
   }
   
   $BorrowedBook = new \App\Models\BorrowedBook();
   if($session->user_type == 'admin'){
      $data['borrowed_books'] = $BorrowedBook->findAll();
   }

  

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'borrowed_books';
		$data['page'] = $page;


		echo view('shared/header', $data);
		echo view('borrowed_books/'.$page, $data);
		echo view('shared/footer', $data);
  }
  
  public function create($page = 'create'){
		if ( ! is_file(APPPATH.'/Views/borrowed_books/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    }
    
    helper('form');
    $BorrowedBook = new \App\Models\BorrowedBook();
    $Student = new \App\Models\Student();
    $Book = new \App\Models\Book();
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 
      'student_id'  => 'required', 
      'book_id' => 'required',
      'date_borrowed' => 'required',
      'quantity' => 'required',
      'date_returned' => 'required',
    ];
		if($request_method == 'post' && $this->validate($required_fields)){

        
      $book = $Book->find($this->request->getVar('book_id'));
      $student = $Student->find($this->request->getVar('student_id'));
      $copies = $book['copies'];
      $quantity = intval($this->request->getVar('quantity'));

      $date_borrowed = $this->request->getVar('date_borrowed');
      $date_returned = $this->request->getVar('date_returned');

      if($copies == 0){
        $data['error_message'] = "{$book['name']} is out of stock.";
      }else if($copies < $quantity){
        $data['error_message'] = "Not enough stock for borrowing {$book['name']}.";
      }else if($date_borrowed > $date_returned){
        $data['error_message'] = "Date borrowed cannot be ahead from Date expected return.";
      }else{
        $data['success_message'] = "{$quantity} {$book['name']} has been successfully borrowed by {$student['name']}."; 
      }

      if(isset($data['success_message'])){
        $BorrowedBook->save([
          'student_id' => $this->request->getVar('student_id'), 
          'book_id' => $this->request->getVar('book_id'),
          'date_borrowed' => $this->request->getVar('date_borrowed'),
          'quantity' => $this->request->getVar('quantity'),
          'date_returned' => $this->request->getVar('date_returned')
        ]);
        
      
        $new_copies = $copies - $quantity;
        $Book->update($book['id'],['copies' => $new_copies]);
      }

      

     
     
    }
		
   

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['controller'] = 'borrowed_books';
    $data['page'] = $page;
    $data['students'] = $Student->findAll(); 
    $data['books'] = $Book->findAll(); 


		echo view('shared/header', $data);
		echo view('borrowed_books/'.$page, $data);
		echo view('shared/footer', $data);
  }

  public function edit($borrowed_book_id){
    $BorrowedBook = new \App\Models\BorrowedBook();
    $Student = new \App\Models\Student();
    $Book = new \App\Models\Book();

      
    helper('form');
    $request_method =  \Config\Services::request()->getMethod();
		$required_fields = [ 
      'status' => 'required',
      'fines' => 'required',
    ];
		if($request_method == 'post' && $this->validate($required_fields)){
      $BorrowedBook->update($borrowed_book_id, [
        'status' => $this->request->getVar('status'),
        'fines' => $this->request->getVar('fines')
      ]);
      return redirect()->to('/libraryapp/public/admin/borrowed_books')->with('success_message', 'Updated Successfully');
    }
		
    $data['title'] = "Edit BorrowedBook"; 
		$data['controller'] = 'borrowed_books';
    $data['page'] = 'edit';
    $data['borrowed_book'] = $BorrowedBook->find($borrowed_book_id);
    $data['students'] = $Student->findAll(); 
    $data['books'] = $Book->findAll(); 


		echo view('shared/header', $data);
		echo view('borrowed_books/edit', $data);
		echo view('shared/footer', $data);
  }

  public function destroy($borrowed_book_id){
    $BorrowedBook = new \App\Models\BorrowedBook();
    $borrowed_book = $BorrowedBook->find($borrowed_book_id);
    $borrowed_book_quantity = $borrowed_book['quantity'];
   
    $Book = new \App\Models\Book();
    $book = $Book->find($borrowed_book['book_id']);
    $copies = $book['copies'];
    $copies += $borrowed_book_quantity;
    $Book->update($book['id'],['copies' => $copies]);

    $BorrowedBook->delete($borrowed_book_id);
    return redirect()->to('/libraryapp/public/admin/borrowed_books')->with('success_message', 'Delete Successfully');
  }

  public function return_book($borrowed_book_id){
    $BorrowedBook = new \App\Models\BorrowedBook();
    $borrowed_book = $BorrowedBook->find($borrowed_book_id);
    $borrowed_book_quantity = $borrowed_book['quantity'];
    
    $BorrowedBook->update($borrowed_book_id,[
      'status' => 'returned',
      'quantity' => 0
    ]);
    
    $Book = new \App\Models\Book();
    $book = $Book->find($borrowed_book['book_id']);
    $copies = $book['copies'];
    $copies += $borrowed_book_quantity;
    $Book->update($book['id'],['copies' => $copies]);

    return redirect()->to('/libraryapp/public/admin/borrowed_books')->with('success_message', 'Return Successfully');
  }

}
