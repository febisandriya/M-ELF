@extends('master')
@section('content')

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Form Supir</li>
          </ol>
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Data</strong> Supir
                      </div>
                      <div class="card-body card-block">
                        <form action="{{route('create.supir')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                          {{ csrf_field() }}

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="name" required="required" class="form-control"></div>

                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Username</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="username" required="required" class="form-control"></div>

                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="password min: 8 karakter" required="required" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="select" class=" form-control-label">Mobil</label></div>
                              <div class="col-12 col-md-9">
                                <select name="mobil_id" id="mobil_id" data-placeholder="Please select..." class="form-control" tabindex="1">
                                  <option value=""></option>
                                  @foreach($mobils as $mobil)
                                  <option value="{{$mobil->id}}">{{$mobil->platno}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
                        <button type="reset" class="btn btn-success btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                        <a href="{{route('data.supir')}}">
                        <button type="button" class="btn btn-danger btn-sm">
                          <i class="fa fa-close"></i> Cancel
                        </button></a>

                      </div>
                    </div>
                  </div>
                </div>
@endsection
