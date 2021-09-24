<?php

namespace App\Http\Controllers;


use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function __construct()
    {

    }


    public function getOffers()
    {

        return Offer::select('id', 'name')->get();
    }

    // public function store(){
    //     Offer::create([//تضيف هذا الي قاعده البيانات حقي
    //         'name' => 'Offer3',
    //         'price' => '5000',
    //         'details' => 'offer details',
    //     ]);
    // }

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request)
    {


        $rules = $this -> getRules();
        $messages = $this -> getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }



        Offer::create([//تضيف هذا الي قاعده البيانات حقي
            'name'    =>  $request->name,
            'price'   =>  $request->price,
            'details' =>  $request->details,
        ]);

        return redirect()->back()->with(['success' => 'تم اضافه بنجاح ']);

    }

    protected function getMessages(){
        return $messages =[
            'name.required' => __('messages.offer name required'),
            'name.unique' => __('messages.offer name must be unique'),
            'price.numeric' => 'سعر العرض ان يكون ارقام',
            'price.required' => 'السعر مطلوب',
            'details.required' => 'التفاصيل مطلوبه',
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',//لازم اقل من 100 حرف ويكون مش مكرر الاسم
            'price' => 'required|numeric',//لازم احرف فقط
            'details' => 'required',
        ];
    }


}
