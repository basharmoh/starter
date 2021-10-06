<?php

namespace App\Http\Controllers;


use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OfferRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\OfferTrait;
use App\Models\Video;
use App\Events\VideoViewer;

class CrudController extends Controller
{


    use OfferTrait;

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

    public function store(OfferRequest $request)//OfferRequest هذا الرسأل موجوده بصفحه
    {


       /* $rules = $this -> getRules();
        $messages = $this -> getMessages();
        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }*/

        $file_name = $this ->saveImage($request -> photo , 'images/offers');//مسار الذي اطرح الصور فيه



        Offer::create([//تضيف هذا الي قاعده البيانات حقي
            'photo'  => $file_name,
            'name_ar'    =>  $request->name_ar,
            'name_en' => $request->name_en,
            'price' =>  $request->price,
            'details_ar'   =>  $request->details_ar,
            'details_en' => $request->details_en,
        ]);

        return redirect()->back()->with(['success' => 'تم اضافه بنجاح ']);

    }


   /* protected function getMessages(){
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
    }*/

    public function getAlloffers(){
        $offers = Offer::select('id',
         'price',
         'name_'.LaravelLocalization::getCurrentLocale().' as name',
         'details_'. LaravelLocalization::getCurrentLocale() . ' as details'

        )-> get();

        return view('offers.all', compact('offers'));
    }

    public function editOffer($offer_id)
    {
        //Offer::findOrFail($offer_id);//لو دخل العميل رقم مش موجود في قاعه البيانات حقي رجعه الي صفحه فاضيه

        $offer = Offer::find($offer_id); //لو دخل العميل رقم مش موجود في قاعه البيانات حقي رجعه الي نفس الصفحه
        if (!$offer)
            return redirect()->back();

        $offer = Offer::select('id', 'name_ar', 'name_en', 'details_ar', 'details_en', 'price')->find($offer_id);

        return view('offers.edit', compact('offer'));

    }

    public function delete($offer_id)
    {
        //check if offer id exists

        $offer = Offer::find($offer_id);   // Offer::where('id','$offer_id') -> first();

        if (!$offer)
            return redirect()->back()->with(['error' => __('messages.offer not exist')]);

        $offer->delete();

        return redirect()
            ->route('offers.all')
            ->with(['success' => __('messages.offer deleted successfully')]);

    }

    public function UpdateOffer(OfferRequest $request,$offer_id){
        $offer = Offer::find($offer_id);
        if (!$offer)
            return redirect()->back();

        $offer->update($request->all());

        return redirect()->back()->with(['success' => ' تم التحديث بنجاح ']);


            /*
            $offer -> update([
                'name_ar' => $request ->name_ar,
                'name_en' => $request ->name_en,
                'price' => $request->price,
            ]);*/


    }

    public function getVideo()
    {
        $video = Video::first();

        event(new VideoViewer($video));

        return view('video') -> with('video', $video);
    }

}
