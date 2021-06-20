@extends('layout/main')

@section('title', 'GR MANUAL ASKI 2')

@section('container')
<div class="row" style="margin: 30px 10px; ">
    <div class="col-md-12">
      <h2>List GR Manual ASKI Plant 2</h2>
      <br><br><br>
      <table id="example" class="display">
        <thead>
          <tr>
            <th>No</th>
            <th>OS</th>
            <th>Surat Jalan</th>
            <th>Nama Part</th>
            <th>Qty OS</th>
            <th>Qty Kedatangan</th>
            <th>Supplier</th>
            <th>Tanggal Input</th>
            <th>Action</th>
        </thead>

        <tbody>
            @php $nomor = 1; @endphp
            @foreach($os3 as $os3)
          <tr>
            <td>{{$nomor}}</td>
            <td>{{$os3->id_os}}</td>
            <td>{{$os3->suratjalan}}</td>
            <td>{{$os3->namapart}}</td>
            <td>{{round($os3->qty_os,0)}}</td>
            <td>{{round($os3->qty_kedatangan,0)}}</td>
            <td>{{$os3->supplier}}</td>
            <td>{{$os3->gr_datetime}}</td>
            <td>
                <a href="{{url('/edit/'.$os3->id.'/editos')}}" class="badge badge-info">edit</a>
            </td>
          </tr>
          @php $nomor++; @endphp
          @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>OS</th>
                <th>Surat Jalan</th>
                <th>Nama Part</th>
                <th>Qty OS</th>
                <th>Qty Kedatangan</th>
                <th>Supplier</th>
                <th>Tanggal Input</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
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
