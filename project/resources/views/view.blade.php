@extends('layout/main')

@section('title', 'GR MANUAL ASKI 2')

@section('container')
<div class="row" style="margin: 30px 10px; ">
    <div class="col-md-12">
      <h2>List Order Sheet ASKI Plant 2</h2>
      <br><br><br>
      <table id="example" class="display">
        <thead>
          <tr>
            <th>No</th>
            <th>OS</th>
            <th>Nama Part</th>
            <th>Nomor Material</th>
            <th>Qty</th>
            <th>UoM</th>
            <th>Supplier</th>
            <th>Delivery Date</th>
            <th>Action</th>
        </thead>

        <tbody>
            @php $nomor = 1; @endphp
            @foreach($os2 as $os2)
          <tr>
            <td>{{$os2->rownumber}}</td>
            <td>{{$os2->OS_Number}}</td>
            <td>{{$os2->Material_Desc}}</td>
            <td>{{$os2->Material}}</td>
            <td>{{round($os2->Qty,0)}}</td>
            <td>{{$os2->UoM}}</td>
            <td>{{$os2->Vendor_Name}}</td>
            <td>{{$os2->Delivery_Date}}</td>
            <td>
                <a href="{{url('/view/'.$os2->rownumber.'/viewedit')}}" class="badge badge-info" data-toggle="modal" data-target="#exampleModalCenter">input</a>
            </td>
          </tr>
          @php $nomor++; @endphp
          @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>OS</th>
                <th>Nama Part</th>
                <th>Nomor Material</th>
                <th>Qty</th>
                <th>UoM</th>
                <th>Supplier</th>
                <th>Delivery Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
      <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">GR MANUAL</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('/view/'.$os2->rownumber)}}" style="font-size: 12px">
                        @csrf
                        <div class="row bordernama">
                            <div class="col-8">
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Nomor OS</label>
                                    <div class="col-sm-9">
                                        <input required readonly type="text" name="id_os" id="id_os" class="form-control" value="{{$os2->OS_Number}}">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Nama Part</label>
                                    <div class="col-sm-9">
                                        <input required readonly type="text" name="namapart" id="namapart" class="form-control" value="{{$os2->Material_Desc}}">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Nomor Material</label>
                                    <div class="col-sm-9">
                                        <input required readonly type="text" name="material" id="material" class="form-control" value="{{$os2->Material}}">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Qty OS</label>
                                    <div class="col-sm-9">
                                        <input required readonly type="text" name="qty_os" id="qty_os" class="form-control" value="{{round($os2->Qty,0)}}">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <input required readonly type="text" name="supplier" id="Vendor_Name" class="form-control" value="{{$os2->Vendor_Name}}">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Qty Kedatangan</label>
                                    <div class="col-sm-9">
                                        <input required type="text" name="qty_kedatangan" id="qty_kedatangan" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">Surat Jalan</label>
                                    <div class="col-sm-9">
                                        <input required type="text" name="suratjalan" id="suratjalan" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group col row">
                                    <label class="col-sm-3 col-form-label">NPK User</label>
                                    <div class="col-sm-9">
                                        <input required type="text" name="userscan" id="userscan" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-4 row">
                                <button style="width: 100%; font-size:20px; border-radius:12px; margin:20px" type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                        {{-- <div class="modal-footer"> --}}
                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                        {{-- </div> --}}
                      </form>
                </div>

            </div>
            </div>
        </div>
    </div>
  </div>
@endsection


@section('jspagination')

<script>

$(document).ready(function() {
    $('#example').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script>

@endsection
