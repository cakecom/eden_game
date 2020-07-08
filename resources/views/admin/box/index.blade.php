@extends('layouts.app2')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">กล่องสุ่มรางวัล</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                               + เพิ่มกล่อง
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>รายการ</th>
                            <th>เวลา/วันที่</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(!is_null($data))

                            @foreach($data as $box)
                        <tr>
                            <td><div class="card" >
                                    <img class="card-img-top" style="max-width: 200px;margin: auto;padding: 20px" src="{{asset('images/web/box2.png')}}" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">ชื่อ: {{$box->name}}</p>
                                        <p class="card-text">รายละเอียด: {{$box->description}}</p>
                                        <p class="card-text">ราคา: {{$box->price}}</p>
                                        <p class="card-text">ราคาโบนัส: {{$box->bonus}}</p>
                                        <a href="{{route('item.show',$box->id)}}" class="btn btn-primary">เพิ่มไอเทม</a>
                                    </div>
                                </div></td>
                            <td>{{$box->created_at}}</td>
                            <td><button type="button" class="btn btn-warning" data-id="{{$box->id}}" data-name="{{$box->name}}"
                                        data-description="{{$box->description}}" data-price="{{$box->price}}" data-bonus="{{$box->bonus}}"
                                        data-toggle="modal" data-target="#edit">
                                    แก้ไข
                                </button></td>
                            <td>  <form action="{{ route('box.destroy', $box->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-icon-split">
                                        <span class="text">ลบ</span>
                                    </button>
                                </form></td>
                        </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-prevent-multiple-submits" action="{{route('box.store')}}" method="POST" >
                            @method('POST')
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มกล่อง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <div class="form-group">
                                    <label for="ืname">ชื่อกล่อง</label>
                                    <input type="text" class="form-control" id="ืname" name="name" >
                                </div>
                                <div class="form-group">
                                    <label for="description">รายละเอียด</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                            <div class="form-group">
                                <label for="price">ราคา</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="bonus">ราคาโบนัส</label>
                                <input type="text" class="form-control" id="bonus" name="bonus">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">บันทึก</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แก้ไขกล่อง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('box.update','update')}}" method="post" enctype="multipart/form-data" >
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="id" id="id" >
                                <div class="form-group">
                                    <label for="name">แก้ไขชื่อ</label>
                                    <input class="form-control" type="text" id="name" name="name" >
                                </div>
                                <div class="form-group">
                                    <label for="department">แก้ไขรายละเอียด</label>
                                    <input class="form-control" type="text" id="description" name="description" >
                                </div>
                                <div class="form-group">
                                    <label for="price">แก้ไขราคา</label>
                                    <input class="form-control" type="text" id="price" name="price" >
                                </div>
                                <div class="form-group">
                                    <label for="bonus">แก้ไขราคาโบนัส</label>
                                    <input class="form-control" type="text" id="bonus" name="bonus" >
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="form-control btn btn-success">ยืนยัน</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $('#edit').on('show.bs.modal',function (event) {
                var button=$(event.relatedTarget);
                var name=button.data('name');
                var price=button.data('price');
                var bonus=button.data('bonus');
                var id=button.data('id');
                var description =button.data('description');
                var modal=$(this);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #bonus').val(bonus);
                modal.find('.modal-body #price').val(price);
                modal.find('.modal-body #description').val(description);
            });
            $('.form-prevent-multiple-submits').on('submit',function () {
                $('.button-prevent-multiple-submits').attr('disabled','true');
            })
        });
    </script>
    @endsection
