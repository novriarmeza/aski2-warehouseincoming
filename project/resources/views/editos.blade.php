@extends('layout/main')

@section('container')
<div class="container">
    <div class="row">

    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{url('/edit/'.$os3->id)}}" style="font-size: 12px">
        @csrf
        <div class="row bordernama">
          <div class="col-8">
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9">
                    <input required readonly type="text" name="id_os" id="id_os" class="form-control" value="{{$os3->id_os}}">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9"><input required readonly type="text" name="suratjalan" id="suratjalan" class="form-control" value="{{$os3->suratjalan}}">
                    <input required readonly type="text" name="namapart" id="namapart" class="form-control" value="{{$os3->namapart}}">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9">
                    <input required readonly type="text" name="qty_os" id="qty_os" class="form-control" value="{{round($os3->qty_os,0)}}">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9">
                    <input required type="text" name="qty_kedatangan" id="qty_kedatangan" class="form-control" value="{{round($os3->qty_kedatangan,0)}}">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9">
                    <input required readonly type="text" name="supplier" id="Vendor_Name" class="form-control" value="{{$os3->supplier}}">
                </div>
            </div>
            <div class="form-group col row">
                <label class="col-sm-3 col-form-label">Nomor OS</label>
                <div class="col-sm-9">
                    <input required type="text" name="userscan" id="userscan" class="form-control" value="{{$os3->userscan}}">
                </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <div class="col-md-4 row">
                <button style="width: 100%; font-size:20px; border-radius:12px; margin:20px" type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div>
      </form>
  </div>
  @endsection
