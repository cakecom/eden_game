    @extends('layouts.app2')
    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ไอเทม</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                                    + เพิ่มไอเทม
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" >
                        <table id="example2" class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>รูปภาพ</th>
                                <th>ชื่อ</th>
                                <th>code</th>
    {{--                            <th>rate</th>--}}
                                <th>ระดับไอเทม</th>
                                <th>จำนวน</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!is_null($data))
                                @foreach($data as $item)
                                    <tr>
                                      <td><img src="{{asset('images/uploads/item/'.$item->image)}}"></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->code}}</td>
    {{--                                    <td>{{$item->rate}}</td>--}}
                                        <th>{{$item->rate_r['name']}}</th>
                                        <td>{{$item->number}}</td>
                                        <td><button type="button" class="btn btn-warning" data-id="{{$item->id}}" data-name="{{$item->name}}"
                                                    data-rate="{{$item->rate}}"  data-code="{{$item->code}}" data-number="{{$item->number}}"
                                                    data-priority="{{$item->priority}}"  data-toggle="modal" data-target="#edit">
                                                แก้ไข
                                            </button></td>
                                        <td>  <form action="{{ route('item.destroy', $item->id) }}" method="POST">
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
                            <form class="form-prevent-multiple-submits" action="{{route('item.store','id='.$boxes_id)}}" method="POST" enctype="multipart/form-data"  >
                                @method('POST')
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มไอเทม</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="boxes_id" name="boxes_id" value="{{$boxes_id}}">
                                    <div class="form-group">
                                        <label for="image">รูปภาพ</label>
                                        <input type="file" class="form-control"  accept="image/*" id="image" name="file" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ชื่อไอเทม</label>
                                        <input type="text" class="form-control" id="name" name="name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="code">code</label>
                                        <input type="text" class="form-control" id="code" name="code" >
                                    </div>
    {{--                                <div class="form-group">--}}
    {{--                                    <label for="rate">rate</label>--}}
    {{--                                    <input type="text" class="form-control" id="rate" name="rate" >--}}
    {{--                                </div>--}}
                                    <div class="form-group">
                                        <label for="priority">ระดับไอเทม</label>
                                        <select class="form-control" id="priority" name="priority">
                                            <option selected disabled>เลือกระดับไอเมม</option>
                                            <option value="1">Legendary</option>
                                            <option value="2">Epic</option>
                                            <option value="3">Rare</option>
                                            <option value="4">normal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="count">จำนวน</label>
                                        <input type="text" class="form-control" id="count" name="count" >
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
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขไอเทม</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('item.update','update')}}" method="post" enctype="multipart/form-data" >
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="id" id="id" >
                                    <div class="form-group">
                                        <label for="ืname">แก้ไขรูปภาพ</label>
                                        <input type="file" class="form-control"  accept="image/*" id="image" name="image" >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">แก้ไขชื่อ</label>
                                        <input class="form-control" type="text" id="name" name="name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="code">แก้ไข code</label>
                                        <input class="form-control" type="text" id="code" name="code" >
                                    </div>
    {{--                                <div class="form-group">--}}
    {{--                                    <label for="rate">แก้ไข rate</label>--}}
    {{--                                    <input class="form-control" type="text" id="rate" name="rate" >--}}
    {{--                                </div>--}}
                                    <div class="form-group">
                                        <label for="priority">แก้ไขระดับไอเทม</label>
                                        <select class="form-control" id="priority" name="priority">
                                            <option value="1">Legendary</option>
                                            <option value="2">Epic</option>
                                            <option value="3">Rare</option>
                                            <option value="4">normal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="count">แก้ไขจำนวน</label>
                                        <input class="form-control" type="text" id="count" name="count" >
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
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                $('#edit').on('show.bs.modal',function (event) {
                    var button=$(event.relatedTarget);
                    var name=button.data('name');
                    var id=button.data('id');
                    var code =button.data('code');
                    // var rate =button.data('rate');
                    var priority =button.data('priority');
                    var count =button.data('number');
                    console.log(priority);
                    var modal=$(this);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #code').val(code);
                    // modal.find('.modal-body #rate').val(rate);
                    modal.find('.modal-body #count').val(count);
                    modal.find('.modal-body #priority').val(priority);
                    // modal.find('.modal-body #priority').text(priority);
                });
                $('.form-prevent-multiple-submits').on('submit',function () {
                    $('.button-prevent-multiple-submits').attr('disabled','true');
                })
            });
        </script>
    @endsection
