<?php
namespace App\Http\Controllers\Tojars;
use App\Http\Controllers\Controller;  
use App\Http\Requests\TojarRequest;   
use App\Models\tojar;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel; 

class TojarController extends Controller
{

    //view

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

        define('pagination',3);
        $tojar=tojar::latest()->select('*')
            ->paginate(pagination);
        foreach($tojar as $tojars) {
            $im =url($tojars->image);
            $tojars->image=$im;

            }
//        return response()->json($tojar);
       return view('tojars.TojarHome')->with('tojar',$tojar);
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

        return view('tojars.edit')->with('tojar',$tojar)->with('key' ,$key);


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


    public function  show_by_id(Request $request,$id){
        //model

        define('pagination',3);
        $tojar=tojar::where('id',$id)->select('*')
            ->paginate(pagination);
        foreach($tojar as $tojars) {
            $im =url($tojars->image);
            $tojars->image=$im;

        }
        return view('tojars.modeeeeee')->with('tojar',$tojar);

    }

    public function search(Request $request){

        $output='';
        $tojar=tojar::where('MerchantName2','Like','%'.$request->search.'%')
            ->orWhere('Paymentstatus','Like','%'.$request->search.'%')
            ->orWhere('IdentificationNumber','Like','%'.$request->search.'%')
            ->orWhere('IdentificationNumber2','Like','%'.$request->search.'%')
            ->get();
        foreach($tojar as $tojars) {
            $output .=
                '<tr>
                    <td>' . $tojars->id . '</td>
                    <td>' . $tojars->MerchantName . '.' . $tojars->MerchantName2 . '</td>
                    <td>' . $tojars->checkboxs . '</td>
                    <td>' . $tojars->crossing . '</td>
                    <td>' . $tojars->Paymentstatus . '</td>
                    <td>' . $tojars->Receiptnumber . '</td>
                    <td>' . $tojars->ThedriverName . '</td>
                    <td>' . '<a href='.url($tojars->image).'>.<img src='. url($tojars->image) . ' alt="اضغط للعرض" height="80" width="100"></a> ' . '</td>
                            </a></td>
                            <td><a class="test"  data-bs-toggle="modal"  data-bs-target="#exampleModal" data-id='.$tojars.'>
                                <button
                                    type="submit"
                                    class="btn btn-show btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </a></td>
                            <td>'.' <a href='.URL('tojar_edit::46779::5'.$tojars->id.'18::6798').'>
                                <button
                                    type="submit"
                                    class="btn btn-edit btn-sm">

                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </button>
                            </a> '.'</td>
                            <td>'.'
                            <form method="post" action='.URL('tojar_delete'.$tojars->id).'>
                           <input type="hidden" name="_token" value='.csrf_token().'>
                            <button
                                type="submit"
                                class="btn btn-delete btn-sm">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </form>
                            '.'</td>
                </tr>';
        }
        return response($output);
    }

public  function  excel(){

        return Excel::download(  (object)'TojarExport','Tojar_excel.xlsx');
}


}
