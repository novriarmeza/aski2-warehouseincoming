@extends('layout/main')

@section('title', 'GR MANUAL ASKI 2')

@section('container')
<div class="row" style="margin: 30px 10px; ">
    <div class="col-md-12">
      <h2>Status OS ASKI Plant 2</h2>
      <br><br><br>
      <table id="example" class="display">
        <thead>
          <tr>
            <th>No</th>
            <th>OS Number</th>
            <th>Nama Part</th>
            <th>Qty OS</th>
            <th>Qty Kedatangan</th>
            <th>Supplier</th>
            <th>Status</th>
        </thead>

        <tbody>
            @php $nomor = 1; @endphp
            @foreach($os4 as $os4)
            @if ($os4->qty_os == $os4->qty_kedatangan)
                @php $status = "bg-success"; @endphp
                @elseif($os4->qty_os > $os4->qty_kedatangan)
                @php $status = "bg-danger"; @endphp
                @elseif($os4->qty_os < $os4->qty_kedatangan)
                @php $status = "bg-warning"; @endphp
            @endif
          <tr>
            <td>{{$nomor}}</td>
            <td>{{$os4->id_os}}</td>
            <td>{{$os4->namapart}}</td>
            <td>{{round($os4->qty_os,0)}}</td>
            <td>{{round($os4->qty_kedatangan,0)}}</td>
            <td>{{$os4->supplier}}</td>
            {{-- <td>{{$os4->status}}</td> --}}
            @if ($os4->qty_os == $os4->qty_kedatangan)
            <td class="text-center {{$status}}" style="font-weight: bold;">Completed</td>
            @elseif ($os4->qty_os > $os4->qty_kedatangan)
            <td class="text-center {{$status}}" style="font-weight: bold;">Pending</td>
            @elseif ($os4->qty_os < $os4->qty_kedatangan)
            <td class="text-center {{$status}}" style="font-weight: bold;">Over</td>
            @endif
          </tr>
          @php $nomor++; @endphp
          @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>OS Number</th>
                <th>Nama Part</th>
                <th>Qty OS</th>
                <th>Qty Kedatangan</th>
                <th>Supplier</th>
                <th>Status</th>
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
