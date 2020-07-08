@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ประวัติการได้รับไอเทม</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" >
                    <table id="example2" class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>กล่อง</th>
                            <th>ไอเทมที่ได้รับ</th>
                            <th>ราคา</th>
                            <th>ราคาโบนัส</th>
                            <th>point คงเหลือ</th>
                            <th>โบนัส คงเหลือ</th>
                            <th>วัน/เวลา</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!is_null($data_h))
                            @foreach($data_h as $history)
                                <tr>
                                    <td>{{$history->box['name']}}</td>
                                    <td>{{$history->item['name']}}</td>
                                    <td>{{$history->price}}</td>
                                    <td>{{$history->bonus}}</td>
                                    <th>{{$history->balance}}</th>
                                    <th>{{$history->balance_bonus}}</th>
                                    <td>{{$history->created_at}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- Modal -->

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

        });
    </script>
@endsection
