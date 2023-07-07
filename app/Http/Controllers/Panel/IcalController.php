<?php

namespace App\Http\Controllers\Panel;
use App\VillaIcal;
use App\Villa;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use  Carbon\Carbon;

class IcalController extends Controller
{

    public function controller_title($type)
    {
        if ($type == 'sum') {
            return 'آیکال ها';
        } elseif ('single') {
            return 'آیکال';
        }
    }

    public function controller_paginate()
    {
        $settings = Setting::select('paginate')->latest()->firstOrFail();
        return $settings->paginate;
    }

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icals = VillaIcal::latest('updated_at')->paginate($this->controller_paginate());
        return view('panel.ical.index', compact('icals'), ['title' => $this->controller_title('sum')]);
    }


    public function search(Request $request)
    {
        $villas = Villa::where('name','LIKE','%'.$request->search.'%')->get();
        $villa_array = array();
        foreach ($villas as $villa){
            array_push($villa_array,$villa->id);
        }

        
        $icals = VillaIcal::where('villa_id',$villa_array)->paginate(9999);

        return view('panel.ical.index', compact('icals'), ['title' => $this->controller_title('sum')]);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($villa_id=null)
    {
     $villas = Villa::pluck('name', 'id');
     $villa = ($villa_id!=null?Villa::find($villa_id):null); 
     return view('panel.ical.create',compact('villas','villa'),['title' => $this->controller_title('single')]);    	
    }
    public function rules()
    {
      return [       
       'ical'       => 'required|mimes:ics'
       ];
     }
	/**
     * Store a newly created resource in storage.
     *
     * @param VillaRequest $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $fileName =  md5(uniqid(rand(), true)) . '.';
        if($request->file('ical')!=null)
        {
           $fileName .=   
        $request->file('ical')->getClientOriginalExtension();

        $request->file('ical')->move(base_path() . '/assets/icals/', $fileName);       
        $path =  '/assets/icals/'.$fileName;
        $is_url = 0;
        }else{
            //$fileName .= 'ics';
            //$path = '/assets/icals/'.$fileName;
            $path = $request->icalurl;
            $is_url = 1;

            //$res = $this->downloadUrlToFile($url, base_path().$path);
            //if(!$res)
              //  return redirect()->back()->with('err_message', 'خطای '.$res.' دانلود رخ داده است، لطفا بررسی نمایید');
        
        }
        $villa_id = $request->villa_id;
        $vilaical = VillaIcal::where('villa_id','=',$villa_id)->get();
        if(count($vilaical)>0)
        {
            $vilaical = $vilaical[0];
            $vilaical->villa_id = $villa_id;
            $vilaical->ical_url = $path;
            $vilaical->is_url = $is_url;
            $vilaical->save();
            return redirect()->route('ical-list')->with('flash_message', 'ویلا با موفقیت افزوده شد.');
        }else{
            try {

                $villa = VillaIcal::create([
                    'villa_id' => $request->villa_id,
                    'ical_url' => $path,
                    'is_url' =>$is_url,
                ]);            
                return redirect()->route('ical-list')->with('flash_message', 'ویلا با موفقیت افزوده شد.');
            } catch (\Exception $e) {

                return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا بررسی نمایید');

            }
        }
    }
    public function destroy($id)
    {
         $villaical = VillaIcal::findOrFail($id);
        try {

            $villaical->delete();
            return redirect()->route('ical-list')->with('flash_message', 'ویلا با موفقیت حذف شد.');

        } catch (\Exception $e) {

            return redirect()->back();

        }
    }
    public function downloadUrlToFile($url, $outFileName)
    {
        try {
             $data = file_get_contents($url);
            $handle = fopen($outFileName, "w");
            fwrite($handle, $data);
            fclose($handle);
            return true;    
        } catch (Exception $e) {
                //('Caught exception: ',  $e->getMessage(), "\n");
            return false;
        }
        //return false; 
    }


}

