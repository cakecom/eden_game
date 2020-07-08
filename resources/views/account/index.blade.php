@extends('layouts.user')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Web Shop

                            @if(!empty(Session::get('get_item')))
                                <div class="modal" id="getItem" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">ขอแสดงความยินดี</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>คุณได้รับ Item</h3>
                                                <div class="info-box">
                                                        <span class="info-box-icon bg-danger"><img
                                                                src="{{asset('images/uploads/item')}}/@php echo Session::get('get_item')['item_image'] @endphp"
                                                                alt="box2"></span>

                                                    <div class="info-box-content">
                                                        <span
                                                            class="info-box-text">@php echo Session::get('get_item')['item_name'].'จำนวน '.Session::get('get_item')['item_number']; @endphp</span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @section('script')

                                <script>
                                    $(function () {
                                        $('#getItem').modal('show');
                                    });
                                </script>
                            @endsection
                            @endif
                        </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                Point : {{$data['pvalues']}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($boxs as $box)

                                <div class="col-md-6 col-sm-6 col-6 " style="border: solid;border-radius: 15px">
                                    <form id="myform" action="{{route('transaction')}}" method="POST">
                                        @method('POST')
                                        @csrf
                                    <div class="row" style="padding: 10px">

                                        <input type="hidden" name="box" id="box" value="{{$box->id}}">
                                        <input type="hidden" name="price" id="price" value="{{$box->price}}">
                                        <input type="hidden" name="price_bonus" id="price_bonus" value="{{$box->bonus}}">
                                        <div class="info-box">
                                   <span class="info-box-icon bg-info"><img src="{{asset('images/web/box2.png')}}"
                                                                            id="{{$box->id}}" alt="box2"></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">ชื่อ: {{$box->name}}</span>
                                                <span class="info-box-text">รายละเอียด: {{$box->description}}</span>
                                                <span class="info-box-number">ราคา: {{$box->price}}</span>
                                                <span class="info-box-number">ราคาโบนัส: {{$box->bonus}}</span>
                                            </div>


                                        </div>
                                        <!-- /.info-box-content -->
                                        <div class="modal fade" id="description" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($box->item as $value)
                                                            <div class="info-box">
                                                                <span class="info-box-icon bg-warning"><img
                                                                        src="{{asset('images/web/box2.png')}}"
                                                                        alt="item"></span>

                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">{!! $value['name'] !!} ({!! $value['number'] !!})</span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <h3 style="color: lawngreen">Win 100% count :{{$count['count']}}
                                                            /100</h3>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" style="padding: 10px">
                                        <div  style="margin: auto">
                                            <div class="form-inline">
                                                <button type="button" class=" btn btn-primary" data-toggle="modal"
                                                        data-target="#description">
                                                    รายละเอียด
                                                </button>
                                                |
                                                <input class="btn btn-success" onclick="confSubmit(this.form);"
                                                       type="button" id="submitBtn" value="ซื้อ" >
                                                |
                                                <input class="btn btn-warning" onclick="confSubmit2(this.form);"
                                                       type="button" id="submitBtn" value="ใช้โบนัส" >

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.info-box -->
                                    </form>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

@endsection

