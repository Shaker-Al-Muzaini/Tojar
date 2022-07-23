@extends('layouts.main')
@section('bott')
    <head>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <style>

            body { background:white;
                unicode-bidi:bidi-override;
                direction: RTL;

            }
            table * {
                border: none;
            }

            th  {

                -webkit-text-fill-color: black;
            }

            span{
                -webkit-text-fill-color: black;
            }

        </style>
        <title>طلب التنسيق </title>
    </head>
    <div class="container">
        <div class="col-12">
            @if(session()->has('massages_session'))
                @if(session('massages_session'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            تم إرسال طلبك بنجاح
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">فشل إرسال طلبك </div
                @endif
            @endif
            {{--                <div class="col-12">--}}
            {{--                    @foreach($errors->all() as $massage)--}}
            {{--                        <div class="alert alert-danger">{{$massage}}</div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            <div class="row">
                <div class="col-12">
                    <br><br>
                    <h3>جمعية تجار قطع غيار السيارات والمعدات الثقيلة</h3>
                    <hr><br>
                    <form action="{{URL('tojar_store')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <span class="input-group-text">عدد التجار</span>
                            <div>
                                <input type="radio" id="test2" name="fav_language2" value="show1"/>
                                <label>تاجر واحد</label>
                                <div id="gr" style="display: none">
                                    <span class="input-group-text" >الاسم</span>
                                    <input type="text" value="{{$tojar->MerchantName2}}"  class="form-control" aria-label="Sizing example input" name="MerchantName2">
                                    <span class="input-group-text" >الهاتف/المحمول</span>
                                    <input type="text" value="{{$tojar->Merchantsphone2}}"  class="form-control"  aria-label="Sizing example input" name="Merchantsphone2">
                                    <span class="input-group-text">رقم الهوية</span>
                                    <input type="number" value="{{$tojar->IdentificationNumber2}}"  class="form-control" aria-label="Sizing example input" name="IdentificationNumber2">
                                    <span class="input-group-text" >رقم الفاتورة /البيان</span>
                                    <input type="number" value="{{$tojar->invoiceNumber2}}" class="form-control"  aria-label="Sizing example input" name="invoiceNumber2">
                                </div>
                                <div>
                                    <input type="radio" id="test3" name="fav_language2" value="hid" />
                                    <label>متعدد التجار</label>
                                    <table id="g" class="table table-bordered border-primar" style="display: none">
                                        <thead class="table table-borderless">
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الهاتف/المحمول</th>
                                            <th>رقم الهوية</th>
                                            <th>رقم الفاتورة /البيان</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td id="col0"><input type="text" class="form-control"  value="{{$tojar->MerchantName}}" name="MerchantName[]" placeholder="Enter your name" ></td>
                                            <td id="col1"><input type="text" class="form-control" value="{{$tojar->Merchantsphone}}" name="Merchantsphone[]" placeholder="Enter your phone" ></td>
                                            <td id="col2">
                                                <input type="number" class="form-control" value="{{$tojar->IdentificationNumber}}" name="IdentificationNumber[]" placeholder="Enter your phone">
                                            </td>
                                            <td id="col3">
                                                <input type="number" class="form-control" value="{{$tojar->invoiceNumber}}" name="invoiceNumber[]" placeholder="Enter your phone">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div id="g2"  style="display: none">
                                        <button type="button" class="btn btn-sm btn-info" onclick="addRows()">اضافة تجار  جديد</button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">حذف التاجر</button>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">التاريخ</span>
                                <input type="date" class="form-control" aria-label="Sizing example input" value="{{$tojar->Date}}" name="Date">
                            </div>
                            @error('Date')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <span class="input-group-text">نوع البضاعة</span>
                            @error('checkboxs')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div>
                                <input class="form-check-input" type="checkbox" value="{{$tojar->checkboxs}}" name="checkboxs[]">
                                <label> زيوت معدنية </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="{{$tojar->checkboxs}}" name="checkboxs[]">
                                <label> قطع مستعملة </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="{{$tojar->checkboxs}}" name="checkboxs[]">
                                <label> قطع جديدة </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اطارات" name="checkboxs[]">
                                <label> اطارات</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="زجاج" name="checkboxs[]">
                                <label> زجاج </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="محركات مستوردة" name="checkboxs[]">
                                <label> محركات مستوردة </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value=" قطع+محركات مستوردة" name="checkboxs[]">
                                <label> قطع+محركات مستوردة </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="تيوبات" name="checkboxs[]">
                                <label> تيوبات </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="جنطات" name="checkboxs[]">
                                <label>  جنطات</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اضافات زيت" name="checkboxs[]">
                                <label> اضافات زيت</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اورياق" name="checkboxs[]">
                                <label> اورياق</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="سيليكون" name="checkboxs[]">
                                <label> سيليكون </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="بيل" name="checkboxs[]">
                                <label>  بيل</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اضافات اخرى" name="checkboxs[]">
                                <label>  اضافات اخرى</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value=" ماء روديتر" name="checkboxs[]">
                                <label> ماء روديتر</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="روديترات" name="checkboxs[]">
                                <label>  روديترات</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اكسسوارات" name="checkboxs[]">
                                <label>   اكسسوارات</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="اطارت متنوعة" name="checkboxs[]">
                                <label>   اطارت متنوعة</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="شحمة" name="checkboxs[]">
                                <label>   شحمة</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="فلاتر" name="checkboxs[]">
                                <label> فلاتر </label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="جكات" name="checkboxs[]">
                                <label>   جكات</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value=" مكن فك وتركي" name="checkboxs[]">
                                <label> مكن فك وتركيب</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="قطع ومحركات مستوردة" name="checkboxs[]">
                                <label>   قطع ومحركات مستوردة</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="checkbox" value="محركات" name="checkboxs[]">
                                <label>  محركات</label>
                            </div>
                            <br>
                            @error('crossing')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="inputGroup-sizing-lg">المعبر المعتمد للبضاعة</span>
                                <select name="crossing"   class="form-select" aria-label="Default select example" >
                                    <option value=""></option>
                                    @foreach($key as $keys=>$value)
                                        <option value="{{$keys}}" @if($keys ===$tojar->crossing) selected @endif;
                                        >{{$value}}</option>
                                    @endforeach
                                </select>
                                <br><br>
                            </div>
                            <form>
                                <br>
                                <div>
                                    <span class="input-group-text">حالة الدفع</span>
                                    <div>
                                        <div>
                                            <input type="radio" value="{{$tojar->Paymentstatus}}" id="test" name="Paymentstatus" />
                                            <label>مدفوع</label>
                                            <table id="first" class="table table-bordered border-primar" style="display: none">
                                                <thead class="table table-borderless">
                                                <tr>
                                                    <th>رقم الإيصال</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td id="c0"><input type="number" value="{{$tojar->Receiptnumber}}" class="form-control" aria-label="Sizing example input" name="Receiptnumber[]"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div id="g3"  style="display: none">
                                                <button type="button" class="btn btn-sm btn-info" onclick="addRows2()">اضافه جديد </button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteRows2()">حذف </button>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="radio" value="{{$tojar->Paymentstatus}}" id="asd" name="Paymentstatus"  />
                                            <label>غير  مدفوع</label>
                                            @error('Paymentstatus')
                                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                <div>
                                                    {{ $message }}
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <table id="too" class="table table-bordered border-primar" >
                                        <thead class="table table-borderless">
                                        <tr>
                                            <th>رقم السيارة</th>
                                            <th>اسم السائق الإسرائيلي </th>
                                            <th> رقم هوية السائق الإسرائيلي</th>
                                            <th>رقم جوال السائق الإسرائيلي</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td id="co0"><input type="text" value="{{$tojar->carNumber}}" class="form-control" name="carNumber[]" placeholder="Enter your ID car" >
                                            </td>
                                            <td id="co1"><input type="text"  value="{{$tojar->ThedriverName}}" class="form-control" name="ThedriverName[]" placeholder="Enter your name" >
                                            </td>
                                            <td id="co2">
                                                <input type="number" value="{{$tojar->DriverID}}" class="form-control" name="DriverID[]" placeholder="Enter your ID">
                                            </td>
                                            <td id="co3">
                                                <input type="tel" value="{{$tojar->DriverMobileNumber}}" class="form-control" name="DriverMobileNumber[]" placeholder="Enter your phone">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div >
                                        <button type="button" class="btn btn-sm btn-info" onclick="addRows3()">اضافه جديد </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteRows3()">حذف </button>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-group-text">رفع ملفات</span>
                                        <input type="file" value="{{url($tojar->image)}}" class="form-control" aria-label="Sizing example input" name="image">
                                        <img src="{{url($tojar->image) }}" alt="d" height="80" width="100">
                                        @error('image')
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                                {{ $message }}
                                            </div>
                                        </div>
                                        @enderror
                                    </div>
                                    {{--            <br>--}}
                                    <button type="submit" class="btn btn-primary" id="save">Save</button>
                                </div>

                            </form>

                            <script>
                                let radio = document.querySelectorAll('[name="Paymentstatus"]');
                                let radio2 = document.querySelectorAll('[name="fav_language2"]');
                                let test = document.querySelector("#test");
                                let test2 = document.querySelector("#test2");
                                let test3 = document.querySelector("#test3");
                                radio.forEach((e) => {
                                    e.addEventListener("click", function () {
                                        if (test.checked) {
                                            document.querySelector("#first").style.display = "block";
                                            document.querySelector("#g3").style.display = "block";
                                        } else {
                                            document.querySelector("#first").style.display = "none"
                                            document.querySelector("#g3").style.display = "none"
                                        }
                                    });
                                });
                                radio2.forEach((e) => {
                                    e.addEventListener("click", function () {
                                        if (test2.checked) {
                                            document.querySelector("#gr").style.display = "block";
                                        } else {
                                            document.querySelector("#gr").style.display = "none"
                                        }
                                    });
                                });
                                radio2.forEach((e) => {
                                    e.addEventListener("click", function () {
                                        if (test3.checked) {
                                            document.querySelector("#g").style.display = "block";
                                            document.querySelector("#g2").style.display = "block";
                                        } else {
                                            document.querySelector("#g").style.display = "none";
                                            document.querySelector("#g2").style.display = "none";
                                        }
                                    });
                                });
                            </script>
                            <script>
                                function addRows()
                                {
                                    var table = document.getElementById('g');
                                    var rowCount = table.rows.length;
                                    var cellCount = table.rows[0].cells.length;
                                    var row = table.insertRow(rowCount);
                                    for(var i =0; i <= cellCount; i++)
                                    {
                                        var cell = 'cell'+i;
                                        cell = row.insertCell(i);
                                        var copycel = document.getElementById('col'+i).innerHTML;
                                        cell.innerHTML=copycel;
                                    }
                                }

                                function deleteRows()
                                {
                                    var table = document.getElementById('g');
                                    var rowCount = table.rows.length;
                                    if(rowCount > '2')
                                    {
                                        var row = table.deleteRow(rowCount-1);
                                        rowCount--;
                                    }else{
                                        alert('لا يمكن الحذف');
                                    }
                                }
                            </script>
                            <script>
                                function addRows2()
                                {
                                    var table = document.getElementById('first');
                                    var rowCount = table.rows.length;
                                    var cellCount = table.rows[0].cells.length;
                                    var row = table.insertRow(rowCount);
                                    for(var i =0; i <= cellCount; i++)
                                    {
                                        var cell = 'cell'+i;
                                        cell = row.insertCell(i);
                                        var copycel = document.getElementById('c'+i).innerHTML;
                                        cell.innerHTML=copycel;
                                    }
                                }

                                function deleteRows2()
                                {
                                    var table = document.getElementById('first');
                                    var rowCount = table.rows.length;
                                    if(rowCount > '2')
                                    {
                                        var row = table.deleteRow(rowCount-1);
                                        rowCount--;
                                    }else{
                                        alert('لا يمكن الحذف');
                                    }
                                }
                            </script>
                            <script>
                                function addRows3()
                                {
                                    var table = document.getElementById('too');
                                    var rowCount = table.rows.length;
                                    var cellCount = table.rows[0].cells.length;
                                    var row = table.insertRow(rowCount);
                                    for(var i =0; i <= cellCount; i++)
                                    {
                                        var cell = 'cell'+i;
                                        cell = row.insertCell(i);
                                        var copycel = document.getElementById('co'+i).innerHTML;
                                        cell.innerHTML=copycel;
                                    }
                                }

                                function deleteRows3()
                                {
                                    var table = document.getElementById('too');
                                    var rowCount = table.rows.length;
                                    if(rowCount > '2')
                                    {
                                        var row = table.deleteRow(rowCount-1);
                                        rowCount--;
                                    }else{
                                        alert('لا يمكن الحذف');
                                    }
                                }
                            </script>

@stop
