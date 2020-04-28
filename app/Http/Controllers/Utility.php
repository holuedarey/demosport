<?php

/**
 * Created by PhpStorm.
 * User: LordRahl
 * Date: 3/17/17
 * Time: 11:02 PM
 */

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Utility {


//    static $XMPP_HOST = "localhost";
//    static $XMPP_SECRET_KEY = "pypAJq2KCmF57Ur6";

    const PAYSTACK_SECRET = "";
    const HOST = "http://157.245.15.5:1000";

    public function __construct() {
    }


    static function returnError($message = "An error occurred", $details=null) {
        $msg = [
            'status'=>'error',
            'message'=> $message,
            'details' => $details];
        return $msg;
    }

    static function returnSuccess($message = "The operation was successful", $data= null) {
        $msg = [
            'status'=>'success',
            'message'=> $message,
            'data' => $data];
        return $msg;
    }


    static function returnValidationError($validation) {
        $errors = $validation->errors();
        $msg = [
            'status'=>'error',
            'message'=> $validation->messages()->first(),
            'data' => ""];
        return $msg;
    }


    static function uploadMedia($file, $folder = "uploads") {

        ini_set('upload_max_filesize', '100000M');
        ini_set('post_max_size', '1000000');

        $path = storage_path($folder);

        if (!file_exists($path)) {
            Storage::disk('local')->makeDirectory($folder, 0777);
        }
//        $file->resize(120, 120, function ($constraint) {
//            $constraint->aspectRatio();
//        });
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move($path, $filename);
        return $folder . '/' . $filename;
    }


    static function createTextImage($text) {
        header('Content-Type: image/png');

        // Create the image
        $im = imagecreatetruecolor(1900, 300);
        $color = rand(0, 255);
        $color2 = rand(0, 255);

        // Create some colors
        $fontColor = imagecolorallocate($im, 255, 255, 255);
        $background = imagecolorallocate($im, $color2, $color, $color);
        imagefilledrectangle($im, 0, 0, 1900, 300, $background);

        $font = '/home/fabuloxi/public_html/finco-assets/ttf/arial.ttf';

        // Add the text
        //imagettftext($im, 50, 0, 390, 170, $fontColor, $font, $text);

        ob_start();
        imagepng($im);

        // Capture the output
        $imagedata = ob_get_contents();

        // Clear the output buffer
        ob_end_clean();
        return $imagedata;
    }

    static function generateRandomChar($num) {
        return str_random($num);
    }

    static function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // invalid email address
            return false;
        }
        return true;
    }
}
