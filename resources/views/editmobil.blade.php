@extends('master')
@section('content')
<div id="content-wrapper">

  <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Form Mobil</li>
          </ol>
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Data</strong> Mobil
                      </div>
                      <div class="card-body card-block">
                        <form action="{{route('update.mobil', $editMobil->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          {{ csrf_field() }}

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Plat No</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="platno" name="platno" value="{{$editMobil->platno}}" required="required" class="form-control"></div>
                          </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-success btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                        <a href="{{route('data.mobil')}}">
                        <button type="button" class="btn btn-danger btn-sm">
                          <i class="fa fa-close"></i> Cancel
                        </button></a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
@endsection
