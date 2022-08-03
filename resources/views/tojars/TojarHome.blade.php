<style>
    div {text-align: center;}
    a:link {
        text-decoration: none;
    }
    .dataTables_length,
    .dataTables_paginate,
    .dataTables_info{
        display: none;
    }
    .print-table path{
        fill: var(--bs-success);
    }
    td .fa-print path{
        fill: var(--main-color);
    }
    td .fa-eye path{
        fill: var(--bs-success);
    }
    .margin-bot{
        margin-bottom: 15px;
    }
    body:not(.modal-open){
        overflow: auto !important;
    }
</style>
@extends('layouts.main')
@section('bott')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الطلبات</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}" />
    <!-- Google Fonts Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400&display=swap"
        rel="stylesheet"
    />
    <!-- DATATABLES -->
    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
    />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('css/tables-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/customers.css')}}" />
</head>
<body>

<div class="loading-screen">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem; color: var(--main-color) !important;" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<h1 class="heading">الطلبات</h1>
<div class="section-style sticky-nav flex-nav">
    <div class="search-container">

        <label for="search">بحث:</label>
        <input type="search"  class="form-control search-width" name="search" id="search">
{{--            <button type="submit"  class="btn btn-primary" style="padding: 5px 20px;">بحث</button>--}}
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                هل تريد حذف الصف؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal1" >نعم</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModalDriver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

<div id="normal-customer" class="table-container normal-customer section-style">
    <div style="display: flex; justify-content: flex-start; align-items: center">
  <a href="{{url('/e')}}">
            <button
                type="submit"
                class="btn print-table-btn">
                <i class="fa-solid fa-print fa-lg print-table"></i>
            </button>
        </a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">الرقم</th>
            <th scope="col">اسم التاجر</th>
{{--            <th scope="col">رقم الفاتورة /البيان </th>--}}
{{--            <th scope="col"> الهاتف/المحمول</th>--}}
{{--            <th scope="col"> رقم الهوية</th>--}}
{{--            <th scope="col"> تاريخ التسجيل</th>--}}
            <th scope="col">نوع البضاعة </th>
            <th scope="col"> المعبر </th>
            <th scope="col">حالة الدفع</th>
            <th scope="col">رقم الإيصال</th>
{{--            <th scope="col"> رقم السيارة</th>--}}
            <th scope="col"> اسم السائق</th>
{{--            <th scope="col"> رقم هوية السائق</th>--}}
{{--            <th scope="col"> رقم جوال السائق</th>--}}
            <th scope="col">الملفات</th>
            <th scope="col">عرض</th>
            <th scope="col">تعديل</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        @foreach($tojar as $tojars )
        <tbody class="alldata">
                    <tr>
                    <td>{{$tojars->id}}</td>
                    <td>{{$tojars->MerchantName}}{{$tojars->MerchantName2}}</td>
{{--                        <td>{{$tojars->invoiceNumber}}{{$tojars->invoiceNumber2}}</td>--}}
{{--                        <td>{{$tojars->Merchantsphone}}{{$tojars->Merchantsphone2}}</td>--}}
{{--                        <td>{{$tojars->IdentificationNumber}}{{$tojars->IdentificationNumber2}}</td>--}}
{{--                    <td >{{$tojars->Date}}</td>--}}
                    <td>{{$tojars->checkboxs}}</td>
                    <td>{{$tojars->crossing}}</td>
                    <td>{{$tojars->Paymentstatus}}</td>
                    <td>{{$tojars->Receiptnumber}}</td>
{{--                    <td>{{$tojars->carNumber}}</td>--}}
                    <td>{{$tojars->ThedriverName}}</td>
{{--                  <td>{{$tojars->DriverID}}</td>--}}
{{--                    <td>{{$tojars->DriverMobileNumber}}</td>--}}
                        <td><a href="{{url($tojars->image)}}"><img  src="{{url($tojars->image) }}" alt="اضغط للعرض" height="80" width="100"></a></td>
                        <td><a href="" class="test"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$tojars}}">
                                <button
                                    type="submit"
                                    class="btn btn-show btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </a></td>

                        <td><a href="{{URL('tojar_edit::46779::5'.$tojars->id.'18::6798')}}">
                                <button
                                    type="submit"
                                    class="btn btn-edit btn-sm">

                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                </button>
                            </a></td>
                    <td>
                        <form method="post" action="{{URL('tojar_delete'.$tojars->id)}}">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-delete btn-sm">
                                <i class="fa-solid fa-trash-can fa-lg"></i>
                            </button>
                        </form>
                    </td>
                  </tr>
                </tbody>
            @endforeach
        @foreach($tojar as $tojars )
        <tbody id="Content" class="searchdata"></tbody>
        @endforeach

              </table>
        <div class="row">
            <div class="d-flex justify-content-center">
                <p> {{ $tojar->links('tojars.pa') }}</p>
            </div>
        </div>
            <div>
                <a href="{{URL('tojar/create')}}">أضافه جديد</a>
            <br>
            </div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/customers-script.js')}}"></script>
<script type="text/javascript">
$('#search').on('keyup',function (){
     $value = $(this).val();
    if($value){
        $('.alldata').hide();
        $('.searchdata').show();

    }
    else {
        $('.alldata').show();
        $('.searchdata').hide();

    }
     $.ajax({
         type:'get',
         url:'{{URL('/search')}}',
         data:{'search':$value},
         success:function (data){
             console.log(data)
             $('#Content').html(data);
         }
     })

})
</script>
@extends('tojars.modeeeeee')
<script type="text/javascript">
    $(document).on('click','.test',function (){
        let modal=$(this).data('id');
        if(modal.MerchantName === null){
            $('.tojar_MerchantName2').html(modal.MerchantName2);
        }else{
            $('.tojar_MerchantName2').html(modal.MerchantName+' '+ modal.MerchantName2);
        } if(modal.invoiceNumber === null){
            $('.tojar_invoiceNumber2').html(modal.invoiceNumber2);
        }else{
            $('.tojar_invoiceNumber2').html(modal.invoiceNumber+' '+ modal.invoiceNumber2);
        }
        if(modal.Merchantsphone === null){
            $('.tojar_Merchantsphone2').html(modal.Merchantsphone2);
        }else{
            $('.tojar_Merchantsphone2').html(modal.Merchantsphone+' '+ modal.Merchantsphone2);
        }
        if(modal.IdentificationNumber === null){
            $('.tojar_IdentificationNumber2').html(modal.IdentificationNumber2);
        }else{
            $('.tojar_IdentificationNumber2').html(modal.IdentificationNumber+' '+ modal.IdentificationNumber2);
        }

        $('.tojar_Date').html(modal.Date);
        $('.tojar_crossing').html(modal.crossing);
        $('.tojar_Paymentstatus').html(modal.Paymentstatus);
        $('.tojar_Receiptnumber').html(modal.Receiptnumber);
         $('.tojar_ThedriverName').html(modal.ThedriverName);
         $('.tojar_DriverID').html(modal.DriverID);
         $('.tojar_DriverMobileNumber').html(modal.DriverMobileNumber);
         $('.tojar_carNumberr').html(modal.carNumber);

    })

</script>

</body>
</html>
@stop



