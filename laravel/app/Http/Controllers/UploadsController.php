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
use App\Utilisateur;
use Request;
use DB;
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
class UploadsController extends Controller
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

            return view('upload');

        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function video()
    {
        if (Auth::user()) {
            return view('video');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function music()
    {
        if (Auth::user()) {
            return view('music');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function text()
    {
        if (Auth::user()) {
            return view('text');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function photos()
    {
        if (Auth::user()) {
            return view('photos');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function view()
    {
        if (Auth::user()) {
            return view('view');
            //return response()->download('cloud/images', '550dc6eb3e1ab.jpeg');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function compressed()
    {
        if (Auth::user()) {
            return view('compressed');
        } else {
            return view('welcome');
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function delete()
    {
        DB::delete('delete from files where id_user = ? and id = ?', [Auth::user()->id, $_GET['id']]);
        return Redirect::to('accueil');
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function fileCheck()
    {
        if (Auth::user()) {
            //$input = Request::only('name');
            $input= Input::all();
            $file = Request::file('file');
            $name = Input::file('file')->getClientOriginalName();
            $extention = Input::file('file')->getClientOriginalExtension();
            $name = uniqid() . "." . $extention;

            if (!empty($input['name'])) {  
                $input['name'] = filter_var($input['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            $verif = array(
                'name' => 'required',
                'file' => 'required|mimes:jpeg,jpg,JPG,JPEG,PNG,BMP,bmp,png,mp3,MPEG2,MPEG1,MP3,avi,mp4,mkv,txt,pdf,wma,flv,rar,zip,tar|max:10000',
                );

            $validator = Validator::make($input, $verif);

            if ($validator->passes()) {

                if ($extention == "PNG" || $extention == "BMP" || $extention == "JPEG" || $extention == "JPG" || $extention == "jpg" || $extention == "bmp" || $extention == "png" || $extention == "jpeg") {
                    $destination = ('cloud/images');
                    Request::file('file')->move($destination, $name);
                    DB::insert('insert into files (id_user, name, file) values (?, ?, ?)', [Auth::user()->id, $input['name'], $name]);
                    return Redirect::to('accueil');

                } elseif ($extention == "txt") {

                    $destination = ('cloud/text');
                    Request::file('file')->move($destination, $name);
                    DB::insert('insert into files (id_user, name, file) values (?, ?, ?)', [Auth::user()->id, $input['name'], $name]);
                    return Redirect::to('accueil');

                } elseif ($extention == "mp3" || $extention == "MP3" || $extention == "MPEG1" || $extention == "MPEG2") {

                    $destination = ('cloud/music');
                    Request::file('file')->move($destination, $name);
                    DB::insert('insert into files (id_user, name, file) values (?, ?, ?)', [Auth::user()->id, $input['name'], $name]);
                    return Redirect::to('accueil');

                } elseif ($extention == "avi" || $extention == "mp4" || $extention == "mkv" || $extention == "wma" || $extention == "flv") {

                    $destination = ('cloud/videos');
                    Request::file('file')->move($destination, $name);
                    DB::insert('insert into files (id_user, name, file) values (?, ?, ?)', [Auth::user()->id, $input['name'], $name]);
                    return Redirect::to('accueil');

                } elseif ($extention == "tar" || $extention == "zip" || $extention == "rar") {

                    $destination = ('cloud/compress');
                    Request::file('file')->move($destination, $name);
                    DB::insert('insert into files (id_user, name, file) values (?, ?, ?)', [Auth::user()->id, $input['name'], $name]);
                    return Redirect::to('accueil');
                }
            
            } elseif (empty($input['name'])) {
                return view('empty');
            } else {
                return view('format');
            }


        } else {
            return Redirect::to('welcome');
        }
    }
   
}
