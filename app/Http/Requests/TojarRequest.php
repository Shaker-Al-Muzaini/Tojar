<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**

 * @property mixed $checkboxs
 */
class TojarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [

            'Date'=>'required',
            'crossing'=>'required',
            'checkboxs'=>'required',
            'DriverMobileNumber'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg|max:2048|image',
            'Paymentstatus'=>'required',

        ];
    }


    public function  messages():array
    {
       return [


           'image.required'=>'يجب أن تكون الصورة',
           'image.image'=>'يجب أن تكون الصورة',
           'image.mimes'=>'يجب أن تكون الصورة من النوع: jpg، png، jpeg، gif، svg.',
           'Date.required'=>'يجب إدخال تاريخ',
           'Paymentstatus.required'=>'يجب إدخال حاله الدفع',
           'checkboxs.required'=>'يجب إدخال نوع البضاعة',
            'crossing.required'=>'يجب إدخال اسم المعبر',

       ];
    }
}
