<?php
  
namespace App\Http\Controllers\Api_controller;  
use App\Http\Controllers\Controller;   
use App\Traits\GeneralTrait;   
use Illuminate\Http\Request;  
use App\Models\tojar;   
use phpDocumentor\Reflection\Types\This;
  
class apiController extends Controller
{

    use  GeneralTrait;


    public  function create()
    {
        $key=['كرم ابو سالم'=>'كرم ابو سالم','بيتونيا'=>'بيتونيا','ترقوميا'=>'ترقوميا'
            ,'معبر رفح'=>'معبر رفح' ,'شعار فرايم'=>'شعار فرايم'];
        return view('tojars.TojarCreate')->with('key' ,$key);
    }

    //create

    public function store(TojarRequest $request)
    {
        //Request

        $MerchantName2=$request['MerchantName2'];
        $Date=$request['Date'];
        $crossing=$request['crossing']; 
        $Merchantsphone2=$request['Merchantsphone2'];
        $IdentificationNumber2=$request['IdentificationNumber2'];
        $invoiceNumber2=$request['invoiceNumber2'];
        $Paymentstatus=$request['Paymentstatus'];
        $path = public_path('tmp/uploads');

        if (!file_exists($path) && !mkdir($path, 0777, true) && !is_dir($path)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
        }

        $file = $request->file('image');
        $fileName = uniqid('', true) . '_' . trim($file->getClientOriginalName());
        $file->move($path, $fileName);
        foreach($request->input('MerchantName') as $key => $value) {

            //model
            $tojar = new tojar();
            $tojar->MerchantName = $request->get('MerchantName')[$key];
            $tojar->Merchantsphone = $request->get('Merchantsphone')[$key];
            $tojar->IdentificationNumber = $request->get('IdentificationNumber')[$key];
            $tojar->invoiceNumber = $request->get('invoiceNumber')[$key];
            foreach ($request->input('DriverID') as $key1 => $value1) {
                $tojar->DriverID = $request->get('DriverID')[$key1];
                $tojar->ThedriverName = $request->get('ThedriverName')[$key1];
                $tojar->carNumber = $request->get('carNumber')[$key1];
                $tojar->DriverMobileNumber = $request->get('DriverMobileNumber')[$key1];
                foreach ($request->input('Receiptnumber') as $key2 => $value2) {
                    $tojar->Receiptnumber = $request->get('Receiptnumber')[$key2];
                    $tojar->checkboxs = implode(',', $request->checkboxs);
                    $tojar->MerchantName2 = $MerchantName2;
                    $tojar->Date = $Date;
                    $tojar->crossing = $crossing;
                    $tojar->IdentificationNumber2 = $IdentificationNumber2;
                    $tojar->Merchantsphone2 = $Merchantsphone2;
                    $tojar->invoiceNumber2 = $invoiceNumber2;
                    $tojar->Paymentstatus = $Paymentstatus;
                    $result = $tojar->image = 'http://localhost:81/tojar/public/tmp/uploads/' . $fileName;
                    $tojar->save();
                }
            }

        }
        return redirect('tojar/create')->with('massages_session',$result);

    }

    //select

    public function index (Request $request)
    {

        //model
        $tojar=tojar::get();
        if(! $tojar) {
            return $this->returnError('form',$tojar,'لم');

        }
        return  $this->returnData('form',$tojar,'تم العرض بنجاح');

    }

    // get  form  by  won  id with  Api

    public function getID(Request $request)
    {


        $tojar=tojar::select('*')->find($request -> id);
        if(! $tojar) {
            return $this->returnError('form',$tojar,'');

        }
        return  $this->returnData('form',$tojar,'تم العرض بنجاح ');

    }
 public function changeStatus(Request $request,)
    {

        $tojar= tojar::where('id',$request->id)->update(['active'=>$request->active]);
        if(! $tojar) {
            return $this->returnError('form',$tojar,'لم');

        }

            return $this->returnSuccessMessage('ok');

    }


    //edit

    public function  edit ($id)
    {
        //model

        $tojar=tojar::where('id',$id)
            ->first();
        $im =url($tojar->image);
        $tojar->image=$im;
        $key=['كرم ابو سالم'=>'كرم ابو سالم','بيتونيا'=>'بيتونيا','ترقوميا'=>'ترقوميا'
            ,'معبر رفح'=>'معبر رفح' ,'شعار فرايم'=>'شعار فرايم'];

//        return view('tojars.edit')->with('tojar',$tojar)->with('key' ,$key);
        return  \request()->json($tojar);





    }

    public function  update (Request $request,$id){
        $MerchantName2=$request['MerchantName2'];
        $Date=$request['Date'];
        $crossing=$request['crossing'];
        $Merchantsphone2=$request['Merchantsphone2'];
        $IdentificationNumber2=$request['IdentificationNumber2'];
        $invoiceNumber2=$request['invoiceNumber2'];
        $Paymentstatus=$request['Paymentstatus'];
        $path = public_path('tmp/uploads');

        if (!file_exists($path) && !mkdir($path, 0777, true) && !is_dir($path)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $path));
        }

        $file = $request->file('image');
        $fileName = uniqid('', true) . '_' . trim($file->getClientOriginalName());
        $file->move($path, $fileName);
        foreach($request->input('MerchantName') as $key => $value) {

            //model
            $tojar = tojar::where('id', $id)->first();
            $tojar->MerchantName = $request->get('MerchantName')[$key];
            $tojar->Merchantsphone = $request->get('Merchantsphone')[$key];
            $tojar->IdentificationNumber = $request->get('IdentificationNumber')[$key];
            $tojar->invoiceNumber = $request->get('invoiceNumber')[$key];
            foreach ($request->input('DriverID') as $key1 => $value1) {
                $tojar->DriverID = $request->get('DriverID')[$key1];
                $tojar->ThedriverName = $request->get('ThedriverName')[$key1];
                $tojar->carNumber = $request->get('carNumber')[$key1];
                $tojar->DriverMobileNumber = $request->get('DriverMobileNumber')[$key1];
                foreach ($request->input('DriverID') as $key2 => $value2) {
                    $tojar->Receiptnumber = $request->get('Receiptnumber')[$key2];
                    $tojar->checkboxs = implode(',', $request->checkboxs);
                    $tojar->MerchantName2 = $MerchantName2;
                    $tojar->Date = $Date;
                    $tojar->crossing = $crossing;
                    $tojar->IdentificationNumber2 = $IdentificationNumber2;
                    $tojar->Merchantsphone2 = $Merchantsphone2;
                    $tojar->invoiceNumber2 = $invoiceNumber2;
                    $tojar->Paymentstatus = $Paymentstatus;
                    $result = $tojar->image = 'http://localhost:81/tojar/public/tmp/uploads/' . $fileName;
                    $tojar->save();
                }
            }
        }
        return redirect('tojar');

    }

    public  function  destroy ($id)
    {


        //model

        tojar::where('id',$id)
            ->delete();
        return redirect('tojar');




    }

}
