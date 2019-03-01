<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Response;
use App\User;
use \Gumlet\ImageResize;

class UserController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::All();

        return view('user', compact('users'));
    }

    public function updatelogin( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->nick = $request->input('login');

        $user->save();

        return Response::json($user->nick);

    }
    public function updatename( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->name = $request->input('name');

        $user->save();

        return Response::json($user->name);
    }
    public function updatesecondname( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->second_name = $request->input('secondname');

        $user->save();

        return Response::json($user->second_name);
    }
    public function updatepatronumic( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->patronumic = $request->input('patronumic');

        $user->save();

        return Response::json($user->patronumic);
    }
    public function updateemail( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->email = $request->input('email');

        $user->save();

        return Response::json($user->email);
    }
    public function updatefoto( Request $request ) {

        $user = User::find( $request->input('id') );

        $url = 'avatars/' . $request->input('id');

        $path = $request->file('foto')->store( $url, 'public');

        $user->foto = '/storage/' . $path;

        $image = new ImageResize( base_path() . '/storage/app/public/' . $path );
        $image->resizeToWidth( 204 );
        $image->save( base_path() . '/storage/app/public/' . $path );

        $user->save();

        return Response::json( $user->foto );
    }
    public function removefoto( Request $request ) {

        $user = User::find( $request->input('id') );

        $url = '/storage/no-avatar.png';

        $user->foto = $url;

        $user->save();

        return Response::json( $user->foto );
    }
    public function updatesignature( Request $request ) {

        $user = User::find( $request->input('id') );

        $user->signature = $request->input('signature');

        $user->save();

        return Response::json($user->signature);
    }

}
