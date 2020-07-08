@extends('layouts.app2')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
{{--                       กล่อง / {{$gallery->name}}--}}
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                + เพิ่มไอเทม
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

{{--                        @if(!is_null($photos))--}}
{{--                            @foreach($photos as $photo)--}}
                                <div class="col-sm-2">

                                    <div style="margin: auto">
                                        <form action="" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button style="width: 100%;" class="btn btn-danger btn-icon-split">
                                                <span class="text">ลบ</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
{{--                            @endforeach--}}
{{--                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
