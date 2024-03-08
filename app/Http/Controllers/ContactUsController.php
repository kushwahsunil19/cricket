<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Models\Contact;
use App\Models\Applynow;
use Carbon\Carbon;
use Session;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Rules\ReCaptcha;
use App\Models\Upload;
use Illuminate\Support\Facades\File;
use Response;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{

    public static function RequMeet($mainTex, $buTex, $bUrl = null)
    {
        return view('component.request-meeting_dynamic', ['mainTex' => $mainTex, 'buTex' => $buTex, 'bUrl' => $bUrl]);
    }
    public static function contact($mainTex = null, $secondTex = null)
    {
        return view('component.contact-form', ['mainTex' => $mainTex, 'secondTex' => $secondTex,]);
    }
    public static function case($mainHeading = null, $subHeading = null, $subTitle1 = null, $subParagraph1 = null, $img1 = null, $subTitle2 = null, $subParagraph2 = null, $img2 = null, $bUrl1 = null, $bUrl2 = null)
    {
        $img1 = asset($img1);
        $img2 = asset($img2);
        return view('component.case-study', ['mainTex' => $mainHeading, 'secondTex' => $subHeading, 'thirdtex' => $subTitle1, 'fourtex' => $subParagraph1, 'fivetex' => $subTitle1, 'sixtex' => $subParagraph1, 'img1' => $img1, 'img2' => $img2, 'firstbulr' => $bUrl1, 'secondurl' => $bUrl2,]);
    }
    public function CookieSet()
    {
        // $response = setcookie("access", 'true', time() + 1200, '/');
        $response = Cookie::queue(Cookie::make('access', 'true', 120));
        return response()->json(['Cookie set successfully.']);
    }


    public function CookieSetOnload()
    {
        // $response = setcookie("access_onload", 'true', time() + 1200, '/');
        $response = Cookie::queue(Cookie::make('access_onload', 'true', 120));
        return response()->json(['Cookie onload set successfully.']);
    }

    public function CookieSetOnloadUnset()
    {
        $response = Cookie::queue(Cookie::forget('access_onload'));
        // $response = setcookie("access_onload", "false", time() - 3600, '/');
        return response()->json(['Cookie unset successfully.']);
    }

    public function contactus(Request $request)
    {

        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'nullable|email|sometimes|required_without:number|regex:/(.+)@(.+)\.(.+)/i',
            'number' => 'nullable|regex:/^\d{10,15}$/|sometimes|required_without:email',
            'subject' => 'required',
            '_token' =>   'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
        $ipaddress = $request->ip();
        $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ipaddress;
        $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
        $city = $addrDetailsArr['geoplugin_city'] . " - " . $addrDetailsArr['geoplugin_countryName'];
        $data = [
            'name' => $request->name,
            'email' => isset($request->email) ? $request->email : null,
            'subject' => $request->subject,
            'number' => isset($request->number) ? $request->number : null,
            'message' => $request->message,
            'ip_address' => $ipaddress,
            'contacted_at' => Carbon::now()
        ];

        $data = Contact::insert($data);
        try {
            if ($data) {
                $userEmail = "rajeshkumbhkar.digiprima@gmail.com";
                $reth = Mail::send('emails.send_contact_detail', [
                    'first_name' => $request->name,
                    'email' => isset($request->email) ? $request->email : null,
                    'phone' => isset($request->number) ? $request->number : null,
                    // 'subject' => $request->subject,
                    'massage' => $request->message,
                    'last_name' => "",
                    'city' => $city

                ], function ($m) use ($userEmail) {
                    $m->from('info@digiprima.com', 'digiprima.com');
                    $m->to($userEmail, 'Admin')->subject('Inquiry from Contact us page');
                });
                return redirect('/feedback');
            } else {
                Session()->flash('error_submit', 'Something Went wrong.plz try after some time!');
                return Redirect::back();
            }
        } catch (\Throwable $th) {
            Session()->flash('error_submit', 'SMTP connect failed.plz try after some time!');
            return Redirect::back();
        }
    }
    public function apply_now(Request $request)
    {

        $validated = $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'apply_for' => '',
            'city' => 'required',
            // 'resume' => 'required|mimes:pdf|between:50,500',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        $data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'apply_for' => $request->apply_for,
            'city' => $request->city,
            'qualification' => '12th'
        );
        $formdata = Applynow::insert($data);

        $file = $request->file('resume');
        $userEmail = 'rajeshkumbhkar.digiprima@gmail.com';
        $customerEmail = $request->email;


        // Send mail to User his new otp
        $name_user = $request->first_name . " " . $request->last_name;
        try {
            if ($request->first_name != null && $request->email != null) {
                $re = Mail::send(
                    'emails.send_contact_detail_apply_now',
                    [
                        'name' => $request->first_name . " " . $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'content' => $request->apply_for,
                        'city' => $request->city
                    ],
                    function ($m) use ($userEmail, $customerEmail, $file, $name_user) {
                        $m->from('info@digiprima.com', 'digiprima.com');
                        $m->to($userEmail, 'apply job')->subject('Emali For Job Apply');
                        $m->replyTo($customerEmail, $name_user);
                        // $m->attsach('https://www.digiprima.com/images/syndifi1_webp');
                        $m->attach($file->getRealPath(), [
                            'as' => 'resume.pdf',
                            'mime' => $file->getMimeType(),
                        ]);
                    }
                );
                // print_r($re);die;
            }

            // Send mail to User his new otp
            Mail::send('emails.send_contact_detail_apply_now_acknowledement', [
                'name' => $request->first_name . " " . $request->last_name,
            ], function ($m) use ($customerEmail) {
                $m->from('info@digiprima.com', 'digiprima.com');
                $m->to($customerEmail, 'apply job')->subject('Mail from Career page ');
            });
            Session()->flash('message', 'Thanks We will revert back soon.');

            return redirect('/career');
        } catch (\Throwable $th) {
            Session()->flash('error_submit', 'SMTP connect failed.plz try after some time!');
            return Redirect::back();
        }
    }
    public function get_file($hash, $name)
    {
        $upload = Upload::where("hash", $hash)->first();

        if (!isset($upload->id) || $upload->name != $name) {
            return response()->json([
                'status' => "failure",
                'message' => "Unauthorized Access 1"
            ]);
        }

        $upload->public = true;

        if ($upload->public) {
            $path = $upload->path;
            // print_r($path);die;
            $filePath = '';
            $mimeType = '';
            if (Str::startsWith($path, 'http://')) {
                // print_r('ddd');die;
                $ext = explode('/', $path);
                $remove_index = 3;
                $resultArray = array_slice($ext, $remove_index);
                $relativePath = implode("/", $resultArray);
                $filePath = base_path() . '/public/' . $relativePath;
                // $filePath= $path;
                // $mimeType = mime_content_type($filePath);
                // print_r($filePath);die;
            } else {
                $ext = explode('/', $path);
                $remove_index = 0;
                if (str_contains($path, 'html')) {
                    $remove_index = 5;
                } else {
                    $remove_index = 4;
                }
                $resultArray = array_slice($ext, $remove_index);
                $relativePath = implode("/", $resultArray);

                $filePath = base_path() . '/' . $relativePath;
            }
            $mimeType = mime_content_type($filePath);

            $headers = array(
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . $filePath . '"'
            );
            return Response::make(file_get_contents($filePath), 200, $headers);
            if (!File::exists($filePath))
                abort(404);

            return $filePath;
        } else {
            return response()->json([
                'status' => "failure",
                'message' => "Unauthorized Access 3"
            ]);
        }
    }
}
