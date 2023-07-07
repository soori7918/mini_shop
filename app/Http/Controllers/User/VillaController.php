<?php

namespace App\Http\Controllers\User;

use App\Villa;
use App\Article;
use App\Category;
use App\City;
use App\Property;
use App\Location;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class VillaController extends Controller
{
    public function index($id=null)
    {
        return view('user.villa.index',['title'=>'املاک']);
    }
    public function show($id)
    {
        $item=Villa::find($id);
        if(!$item)
        {
            abort(404);
        }
        $item->view+=1;
        $item->update();

        $title=$item->name;
        $pro_in = Property::where('type', 0)->get();
        $pro_out = Property::where('type', 1)->get();
        $pro_access = Property::where('type', 2)->get();
        $items= Villa::where('status', 'published')->where('villa_vip',1)->orderBy('view', 'desc')->where('id','!=',$item->id)->take('4')->get();
        $blog=Article::where('status',1)->orderBy('id','DESC')->take(8)->get();
        $projects=Category::where('type', 'villa')->where('status', 'published')->take(8)->get();
        return view('user.villa.show',compact('item','pro_in','pro_out','pro_access','items','blog','projects'),['title'=>$title]);
    }

    public function search($type_melk,Request $request)
    {
//        dd($request->all());
        $price_min_all=Villa::all()->min('price');
        $price_max_all=Villa::all()->max('price');
        $area_min_all=Villa::all()->min('area');
        $area_max_all=Villa::all()->max('area');
        $state_id='';
        $price_type='price_lir';
        $city_id=[];
        $locate_id=[];
        $room_num=[];
        $type_info=[];
        $type_villa=[];
        $citys='';
//        $citys = City::where('state_id',null)->where('city_id',null)->get();
        $states = City::where('state_id',null)->get();
        $locates = Location::orderBy('city_id', 'asc')->get();
        if($request->count_page)
        {
            $count_page=$request->count_page;
        }
        else
        {
            $count_page=12;
        }
        if($request->sort_id)
        {
            $sort_id=$request->sort_id;
        }
        else
        {
            $sort_id='new';
        }
        if(isset($request->price_type))
        {
            $price_type=$request->price_type;
        }
        $items = Villa::where('status', 'published');
        if($type_melk!='all')
        {
            $items=$items->where('category_id',$type_melk);
        }
        if(isset($request->room_num))
        {
            $room_num=$request->room_num;
            if(!in_array('all',$room_num))
            {
                $items=$items->whereIN('room_num',$room_num);
            }
        }
        if($request->type_info)
        {
            $type_info=$request->type_info;
            if(!in_array('all',$type_info))
            {
                $items=$items->whereIN('type_info',$type_info);
            }
        }
        if($request->state_id!='')
        {
            $state_id=$request->state_id;
            $items=$items->where('state_id',$request->state_id);
            $citys=City::where('state_id',$state_id)->get();
        }
        if($request->city_id!='')
        {
            $city_id=$request->city_id;
            if(!in_array('all',$room_num))
            {
                $items=$items->whereIN('city_id',$city_id);

            }
        }
        if($request->zone_id!='')
        {
            $zone_id=$request->zone_id;
            $items=$items->where('zone_id',$request->zone_id);
        }
        if(isset($request->type_villa) && $request->type_villa!='')
        {
            $type_villa=$request->type_villa;
            $items=$items->wherein('type_villa',$type_villa);
        }
        if(isset($request->locate) && $request->locate!='all')
        {
            $locate_id=$request->locate;
            $items=$items->whereIN('location_id',$request->locate);
        }
        if($sort_id=='new')
        {
            $items=$items->orderBy('id','DESC');
        }
        elseif($sort_id=='min_price')
        {
            $items=$items->orderBy('price','ASC');
        }
        elseif($sort_id=='max_price')
        {
            $items=$items->orderBy('price','DESC');
        }
        elseif($sort_id=='seen')
        {
            $items=$items->orderBy('view','DESC');
        }
        if($request->price)
        {
            $price=str_replace('لیر','',$request->price);
            $price=str_replace(' ','',$price);
            $price=explode('-',$price);

            if(count($price)>1 && !in_array('NaN',$price))
            {
                if($price[0]<=$price[1])
                {
                    $price_min=$price[0];
                    $price_max=$price[1];
                }
                else
                {
                    $price_min=$price[1];
                    $price_max=$price[0];
                }

                if($price_min>$price_min_all)
                {
                    $items=$items->where('price','>=',$price_min);
                }
                if($price_max<$price_max_all)
                {
                    $items=$items->where('price','<=',$price_max);
                }
            }
            else
            {
                $price_min=Villa::min('price');
                $price_max=Villa::max('price');
            }
        }
        else
        {
            $price_min=Villa::min('price');
            $price_max=Villa::max('price');
        }
        if($request->price_type)
        {
            $price_type=$request->price_type;
            if($price_type=='price_lir')
            {
                $price=$price=explode(';',$request->price_lir);
                if(count($price)>1 && !in_array('NaN',$price))
                {
                    if($price[0]<=$price[1])
                    {
                        $price_min=$price[0];
                        $price_max=$price[1];
                    }
                    else
                    {
                        $price_min=$price[1];
                        $price_max=$price[0];
                    }

                    if($price_min>$price_min_all)
                    {
                        $items=$items->where('price','>=',$price_min);
                    }
                    if($price_max<$price_max_all)
                    {
                        $items=$items->where('price','<=',$price_max);
                    }
                }
                else
                {
                    $price_min=Villa::min('price');
                    $price_max=Villa::max('price');
                }
            }
            elseif($price_type=='price_toman')
            {
                $price=$price=explode(';',$request->price_toman);
                if(count($price)>1 && !in_array('NaN',$price))
                {
                    if($price[0]<=$price[1])
                    {
                        $price_min=$price[0];
                        $price_max=$price[1];
                    }
                    else
                    {
                        $price_min=$price[1];
                        $price_max=$price[0];
                    }
                    if($price_min>Villa::convertPrice($price_min_all,'toman'))
                    {
                        $price_min=Villa::convertPriceAx($price_min,'toman');
                        $items=$items->where('price','>=',$price_min);
                    }
                    if($price_max<Villa::convertPrice($price_max_all,'toman'))
                    {
                        $price_max=Villa::convertPriceAx($price_max,'toman');
                        $items=$items->where('price','<=',$price_max);
                    }
                }
                else
                {
                    $price_min=Villa::min('price');
                    $price_max=Villa::max('price');
                }
            }
            elseif($price_type=='price_dollar')
            {
                $price=$price=explode(';',$request->price_dollar);
                if(count($price)>1 && !in_array('NaN',$price))
                {
                    if($price[0]<=$price[1])
                    {
                        $price_min=$price[0];
                        $price_max=$price[1];
                    }
                    else
                    {
                        $price_min=$price[1];
                        $price_max=$price[0];
                    }

                    if($price_min>Villa::convertPrice($price_min_all,'dolar'))
                    {
                        $price_min=Villa::convertPriceAx($price_min,'dollar');
                        $items=$items->where('price','>=',$price_min);
                    }
                    if($price_max<Villa::convertPrice($price_max_all,'dolar'))
                    {
                        $price_max=Villa::convertPriceAx($price_max,'dollar');
                        $items=$items->where('price','<=',$price_max);
                    }
                }
                else
                {
                    $price_min=Villa::min('price');
                    $price_max=Villa::max('price');
                }
            }
        }
        if($request->area)
        {
            $area=str_replace('متر','',$request->area);
            $area=str_replace(' ','',$area);
            $area=explode(';',$area);
            if(count($area)>1 && !in_array('NaN',$area))
            {
                if($area[0]<=$area[1])
                {
                    $area_min=$area[0];
                    $area_max=$area[1];
            }
            else
                {
                    $area_min=$area[1];
                    $area_max=$area[0];
                }

                if($area_min>$area_min_all)
                {
                    $items=$items->where('area','>=',$area_min);
                }
                if($area_max<$area_max_all)
                {
                    $items=$items->where('area','<=',$area_max);
                }
            }
            else
            {
                $area_min=Villa::min('area');
                $area_max=Villa::max('area');
            }
        }
        else
        {
            $area_min=Villa::min('area');
            $area_max=Villa::max('area');
        }
        $items=$items->paginate($count_page);
        return view('user.villa.index',compact('items','states','locates','city_id','locate_id','room_num','type_info','price_min','price_max','price_min_all','area_max_all','area_min_all','area_max','area_min','price_max_all','count_page','citys','city_id','state_id','sort_id','type_villa','type_melk','price_type'),['title'=>'پروژه ها']);
    }
    

}
