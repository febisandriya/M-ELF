@extends('master')
@section('content')

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Mobil</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Mobil</div>

            <div class="card-body">
              <div align="right">
                        <a href="{{route('add.mobil')}}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp; New</button></a>
                    </div><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Plat No</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Plat No</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($data as $datas)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datas->platno}}</td>
                        <td>  <center><a href="{{route('edit.mobil', [$datas->id])}}">
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></button>
                              </a>
                              <form method="POST" action="{{route('delete.mobil', [$datas->id]) }}" style="display: inline-block;">
                              {{ csrf_field() }}
                                 <button type="submit" onClick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                               </form>
                                </center>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

  @endsection
