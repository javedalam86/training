<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Models\Pages; 
use App\Models\Books; 
use App\Models\Courses;



class BookController extends Controller
{
	
	var $recordPerPage =20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function booklist()
    {
       // $pages = Pages::all();	
      //  $Books = Books::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();
	$Courses = Courses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
        return view('booklist', ['Courses' => $Courses] );
    }
	
    public function bookdetail(Request $request, $id)
    {
        //$BookData = Books::where('is_deleted', '=', '0')->where('id', '=', $id)->get()->toArray();
        $BookData = Books::select('course_books.id as id','courses.name as cname','course_books.description','type','course_books.name','course_id','bookpath');	
	$BookData->leftJoin('courses', function ($join) {
        $join->on('courses.id', '=', 'course_books.course_id');
	});
	$BookData->where('course_books.id', '=', $id);
	$BookData =	$BookData->get()->toArray();	
	$Book =  $BookData[0];
        return view('bookdetail', compact('Book'));
    }
	
    function ajaxbooklist(Request $request){
	$data = $request->all();
	$page =$data['pagination']['page'];	
	$per_page = $data['pagination']['perpage'];	
	if($per_page ==''){
            $per_page =10;
        }		
	$method='GET';
	$searchArray['per_page']=$per_page;
	$searchArray['page']	=$page;
		
	//$pageNo = 1;
		$questiosData = Books::select('course_books.id as id','courses.name as cname','course_books.description','course_books.name','course_id','bookpath');			
		if(@isset($data['query']['bookgeneralSearch'])){
			$searchKey =$data['query']['bookgeneralSearch'];	
			$questiosData = $questiosData->where(function($q) use ($searchKey){
				$q->where('course_books.name', 'LIKE', '%' . $searchKey . '%')
				->orWhere('course_books.description', 'LIKE', '%' . $searchKey . '%')
				->orWhere('courses.name', 'LIKE', '%' . $searchKey . '%')
				->orWhere('course_id', 'LIKE', '%' . $searchKey . '%');
		});
		}	
		$sortfield ='id';
		if(@isset($data['sort']['field']) ){
			if(in_array($data['sort']['field'], array('name','description','id','cname'))){
			$sortfield =$data['sort']['field'];
			}else{ $sortfield  = 'id'; }
		}
		$sortorder ='ASC';
		if(@isset($data['sort']['sort'])){
			$sortorder =$data['sort']['sort'];
			
		}
		
		$questiosData->leftJoin('courses', function ($join) {
            $join->on('courses.id', '=', 'course_books.course_id');
			});
		
		
		if($page ==1){ $offset = 0; }else{ $offset = $this->recordPerPage*($page-1); }
		$questiosData->where('course_books.is_deleted', '=', '0');
		$questiosData->offset($offset);
        $questiosData->limit($this->recordPerPage);
		$questiosData->orderBy($sortfield, $sortorder);
		$questiosData =	$questiosData->get()->toArray();		
		
		$userCount = Books::select('*');
		if(@isset($data['query']['bookgeneralSearch'])){
			$searchKey =$data['query']['bookgeneralSearch'];	
			$userCount = $userCount->where(function($q) use ($searchKey){
				$q->where('name', 'LIKE', '%' . $searchKey . '%');
		});
		}
		$userCount->where('is_deleted', '=', '0');
		$userCount =$userCount->get();			
		$totalRecord =$userCount->count();	
		
		$resultDataTable['data'] = $questiosData;	
		$resultDataTable['meta']['page'] = $page;
		$resultDataTable['meta']['pages'] = ceil($totalRecord/$per_page);
		$resultDataTable['meta']['perpage'] = $per_page;
		$resultDataTable['meta']['total'] = $totalRecord;
			return json_encode($resultDataTable);
}
	
	


/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function bookadd(Request $request)
    {		$data = $request->all();
			$validator = Validator::make($request->all(), [ 
				'name'=> 'required|min:5', 
				'file' => 'sometimes|mimes:jpeg,png,doc,docx,pptx,pps,ppt,PPT,PDF,pdf,jpg,gif,svg',
			]);	
			
			
			
			
		if ($validator->fails()) { 
			return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
		}else{
			
			$BooksPostData = new Books;
/*
$BooksPostData->body = request('body');
$comment->email = request('email');
$comment->name = request('name');
$comment->post_id = $post->id;*/




			if($files=$request->file('file')){
			$name=$files->getClientOriginalName();			
			$name = time().'.'.$files->getClientOriginalExtension(); 
			$destinationPath = public_path('/coursebooks/');
			$files->move($destinationPath, $name);
			 $inputBook['bookpath'] 		=   $name;
			 $BooksPostData->bookpath =  $name;
			}	
		
			
			
			//  $file     = request()->file('file');	 bookpath 
	//$path = $file->getPathname();	
	
	
			  // $imageName = time().'.'.request()->image->getClientOriginalExtension();

  

       // request()->image->move(public_path('images'), $imageName); courseid
		
		/*
			$inputBook['name'] =$data['name'];
			$inputBook['course_id'] =$data['courseid'];				
			$inputBook['description'] =$data['description'];
						print_r($inputBook)	;
			$book = Books::create($inputBook); */	
				 $BooksPostData->name =$data['name'];
				 	 $BooksPostData->course_id =  $data['courseid'];				
					 	 $BooksPostData->description =$data['description'];
			$BooksPostData->save();
			return response(array("status"=>"success", "code"=>200,"data" => $inputBook));
		}	
       
    }


   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbook(Request $request)
    {     
		$data = $request->all();
		$validator = Validator::make($request->all(), [ 
				'bookId' => 'required', 
				'name' => 'required|min:2', 
				
			]);					
		if ($validator->fails()) { 
			return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
		}else{
			$id = $data['bookId'];

        $Book = Books::find($id);	
			
				if($files=$request->file('file')){
			$name=$files->getClientOriginalName();			
			$name = time().'.'.$files->getClientOriginalExtension(); 
			$destinationPath = public_path('/coursebooks/');
			$files->move($destinationPath, $name);
			$Book->bookpath 		=   $name;
			}	
			
				
        $Book->name 		=  $request->get('name');
        $Book->description 		=  $request->get('description');	
        $Book->course_id 		=  $request->get('courseid');		
        $Book->save();
      return response(array("status"=>"success", "code"=>200,"data" => $Book));
    }}








public function parseImport(Request $request)
{	$data = $request->all();
    $file     = request()->file('file');	 
	$path = $file->getPathname();	
	$CSVdata = array_map('str_getcsv', file($path));
	$alreadyExistingQuestion = array();
	$duplicateBooks =0;
	$optionLength =0;
	$header_added = $data['header_added'];
	if($header_added =='true'){
		array_shift($CSVdata);
	}

	foreach($CSVdata as $CSVRow){	
			$book = $CSVRow['0'];
			$correctOption =$CSVRow['5'];		
			if(strlen($correctOption)>1){
				$optionLength =1;
			}
		$QuestionRecord = Books::where('is_deleted', '=', '0')->where('book', '=', $book)->get()->toArray();
		if(count($QuestionRecord)>=1){
			$alreadyExistingQuestion[]= $book;
			$duplicateBooks =1;	
		}
	}
	if($duplicateBooks ==1){
		return response(array("status"=>"fail", "type"=>'duplicate', "code"=>200,"data" => $alreadyExistingQuestion));
	}elseif($optionLength ==1){
		return response(array("status"=>"fail", "type"=>'answerlength', "code"=>200,"data" => $alreadyExistingQuestion));
	}else{	
		
		foreach($CSVdata as $CSVRow){
			$input = array();			
			$input['book'] =$CSVRow['0'];				
			$input['option_a'] =$CSVRow['1'];
			$input['option_b'] =$CSVRow['2'];
			$input['option_c'] =$CSVRow['3'];
			$input['option_d'] =$CSVRow['4'];
			$input['correct_option'] =$CSVRow['5'];					
			$book = Books::create($input);			
		}		
		return response(array("status"=>"success", "code"=>200,"data" => $book));
	}
}





public function deletebook(Request $request)
{	$data = $request->all(); 
	$id = $data['bookIdDelete'];
	$Question = Books::find($id);		
    $Question->is_deleted 		=  1;
    $Question->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Question));	  
}


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  bookpath
     */
    public function bookdownload(Request $request,$bookpath)
    {
        $file = '../public/coursebooks/'.$bookpath;
        $name = basename($file);
        return response()->download($file, $name);
      
    }
	

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  bookpath
     */
    public function getfiledata(Request $request)
    {   $data = $request->all(); 
		$filePath = $data['filePath'];
		$fileBasePath = '../public/coursebooks/'.$filePath; 
        $base64PDF = chunk_split(base64_encode(file_get_contents($fileBasePath))); 
		$fileData['base64']= $base64PDF;
		$fileData['title']='PDF File';	
		return response(array("status"=>"success", "code"=>200,"data" => $fileData));	
      
    }
	

	
	
}