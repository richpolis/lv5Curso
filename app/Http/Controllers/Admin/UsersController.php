<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Validator;

use Input;

class UsersController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('@findUser',['only'=>['show','edit','update','destroy']]);
	}

	public function findUser(Route $route)
	{
		$this->user = User::findOrFail($route->getParameter('users'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//$usuarios = User::paginate();
		$usuarios = User::name($request->get('name'))
					->type($request->get('type'))
					->orderBy('id','DESC')
					->paginate(5);

		return view('admin.users.index',compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @param Redirector $redirect
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		/*$data  = Request::all();

		$rules = array(
			'first_name'=>'required',
			'last_name'=>'required', 
			'email'=>'required', 
			'password'=>'required',
			'type'=>'required'
		);

		$v = Validator::make($data,$rules);

		if($v->fails())
		{
			return redirect()->back()
							 ->withErrors($v->errors())
							 ->withInput(Request::except('password'));
		}

		$user = new User($data);

		$user->save();

		return \Redirect::route('admin.users.index');  forma de utilizar el objeto en definicion global

		*/

		User::create($request->all());
		return redirect()->route('admin.users.index');	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.users.edit')->with('user',$this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		//$user->fill(Request::all()); forma de usar Facade 
		$this->user->fill($request->all());
		$this->user->save();
		//return \Redirect::route('admin.users.index');
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
	
		$this->user->delete();
		$message = $this->user->full_name . ' fue eliminado de nuestros registros';

		if($request->ajax()){
			//return $message;
			return response()->json([
				'id'		=> 	$this->user->id,
				'message'	=>	$message
			]);
		}

		\Session::flash('message',$message);
		return redirect()->route('admin.users.index');

	}

}
