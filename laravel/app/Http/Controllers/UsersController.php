<?php
/**
*PHP version 5
*File doc comment
*@category Sniffer
*@package  Sniffer.Test
*@author   ANTON Maicmelan <maicmelan.anton@epitech.eu>
*@license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
*@link     http://intra.epitech.eu
*/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Auth;
use DB;
use Mail;
use Hash;
/**
*PHP version 5
*Class doc domment
*
*@category Sniffer
*@package  Sniffer.Test
*@author   ANTON Maicmelan <maicmelan.anton@epitech.eu>
*@license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
*@link     http://intra.epitech.eu
*/
class UsersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function index()
    {
        if (Auth::user()) {

            return Redirect::to('accueil');

        } else {
            return view('welcome');
        }

    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function accueil()
    {

        if (Auth::user()) {

            $donne = DB::select('select * from files where id_user = ?', [Auth::user()->id]);
            return view('accueil');

        } else {

            return Redirect::to('login');
        }

    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function contact()
    {
        if (Auth::user()) {
            return view('contact');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function contactVerif()
    {
        if (Auth::user()) {
            
            //Mail::raw('contact', function($message)
            //{
                //$message->from(Auth::user()->email, Auth::user()->username);

              //  $message->to('Mike77_@hotmail.fr');
            //});
            return view('accueil');
        } else {
            //  return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function inscription()
    {
        if (Auth::user()) {

            return Redirect::to('accueil');

        } else {

            return view('inscription');
        }

    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function login()
    {
        if (Auth::user()) {

            return Redirect::to('accueil');

        } else {
            return view('login');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function inputInscription()
    {
        $input = Input::all();
        $verif = array(
            'username' => 'required|unique:users|min:5',
            'name' => 'required',
            'lastname' => 'required',
            'birthdate' => 'date',
            'email' => 'required|unique:users|email',
            'password' => 'required'
            );
        $send = Validator::make($input, $verif);
        if ($send->passes()) {
            $mdp = $input['password'];
            $mdp = Hash::make($mdp);
            $user = new Utilisateur();
            $user->username = $input['username'];
            $user->name = $input['name'];
            $user->birthdate = $input['birthdate'];
            $user->lastname = $input['lastname'];
            $user->email = $input['email'];
            $user->password = $mdp;
            $user->save();

            return Redirect::to('login');


        } else {
            return Redirect::to('inscription');
            echo "non";
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function inputLogin()
    {

        $input = Input::all();
        $verif = array(
            'username' => 'required',
            'password' => 'required'
            );

        $login = Validator::make($input, $verif);

        if ($login->passes()) {

            $donne = array(
                'username' => $input['username'],
                'password' => $input['password']
                );

            if (Auth::attempt($donne)) {

                return Redirect::to('accueil');

            } else {

                return Redirect::to('login');
            }
            
        } else {

            return Redirect::to('login')->withErrors($login);
            
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
