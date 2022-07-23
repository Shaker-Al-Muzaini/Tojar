<style>
    body{
        direction: RTL;
    }
    div {text-align: center;}
    a:link {
        text-decoration: none;
    }
</style>
@extends('layouts.main')
@section('bott')
    <head>
    <title>طلب تنسيق</title>
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
    </head>
    <h3 class="heading">طلب تنسيق</h3>
    <div class="table-container section-style">
        <table class="table table-striped">
        <thead>
                <tr role="row"><th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 97px;">ID</th>
              <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="اسم التاجر: activate to sort column ascending" style="width: 400px;">اسم التاجر</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم الفاتورة /البيان: activate to sort column ascending" style="width: 600px;">رقم الفاتورة /البيان</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="االهاتف/المحمول: activate to sort column ascending" style="width: 700px;">الهاتف/المحمول</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم الهوية: activate to sort column ascending" style="width: 170px;">رقم الهوية</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="تاريخ التسجيل: activate to sort column ascending" style="width: 170px;">تاريخ التسجيل</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="نوع البضاعة: activate to sort column ascending" style="width: 170px;">نوع البضاعة</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="المعبر: activate to sort column ascending" style="width: 170px;">المعبر</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="حالة الدفع: activate to sort column ascending" style="width: 170px;">حالة الدفع</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم الإيصال: activate to sort column ascending" style="width: 170px;">رقم الإيصال</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم السيارة: activate to sort column ascending" style="width: 170px;">رقم السيارة</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="اسم السائق: activate to sort column ascending" style="width: 170px;">اسم السائق</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم هوية السائق: activate to sort column ascending" style="width: 170px;">رقم هوية السائق</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="رقم جوال السائق: activate to sort column ascending" style="width: 170px;">رقم جوال السائق</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="الملفات: activate to sort column ascending" style="width: 170px;">الملفات</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="الملفات: activate to sort column ascending" style="width: 170px;">تعديل</th>
                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="الملفات: activate to sort column ascending" style="width: 200px;">حذف</th>
        </thead>
        <tbody>
        @foreach($tojar as $tojars )
            <tr>
            <td>{{$tojars->id}}</td>
            <td>{{$tojars->MerchantName}}{{$tojars->MerchantName2}}</td>
                <td>{{$tojars->invoiceNumber}}{{$tojars->invoiceNumber2}}</td>
                <td>{{$tojars->Merchantsphone}}{{$tojars->Merchantsphone2}}</td>
                <td>{{$tojars->IdentificationNumber}}{{$tojars->IdentificationNumber2}}</td>
            <td >{{$tojars->Date}}</td>
            <td>{{$tojars->checkboxs}}</td>
            <td>{{$tojars->crossing}}</td>
            <td>{{$tojars->Paymentstatus}}</td>
            <td>{{$tojars->Receiptnumber}}</td>
            <td>{{$tojars->carNumber}}</td>
            <td>{{$tojars->ThedriverName}}</td>
          <td>{{$tojars->DriverID}}</td>
            <td>{{$tojars->DriverMobileNumber}}</td>
            <td><img src="{{url($tojars->image) }}" alt="d" height="80" width="100"></td>
            <td >
                <form method="post" action="{{URL('tojar_delete'.$tojars->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
                <td><a href="{{URL('tojar_edit::46779::5'.$tojars->id.'18::6798')}}" class="btn btn-success">Edit</a></td>
          </tr>
        </tbody>
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
@stop

