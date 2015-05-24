<?php namespace qwotes\Http\Controllers;

use qwotes\Qwote;
use Auth;
use qwotes\Commands\EmailQwotes;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $job = new EmailQwotes;

	   $this->dispatch($job);

        //$qwotes = Qwote::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(4);

		//return view('home')->with('qwotes', $qwotes);
	}

}
