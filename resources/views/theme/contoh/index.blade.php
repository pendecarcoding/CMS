@extends('theme.Layouts.design')
@section('content')
<?php
use App\Level;
$level = Level::all();
 ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>Data Jabatan</h1>
      <p>Menu untuk mengatur Data Jabatan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
 @include('theme.Layouts.alert')
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Daftar Data Jabatan
        <a data-toggle='modal' href="#tambah" data-target="#tambah" style="color:white;"class="btn waves-effect waves-light btn-primary pull-right">Tambah Jenis</a>
      </h4>
      <!-- Modal -->
      <br><br>
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
        <tr>
          <th>#</th>
          <th>Jabatan</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $index => $v)
          <tr>
            <td>{{$index+1}}</td>
            <td>{{$v->jabatan}}</td>
            <td><a href="{{url('alur_disposisi?act=setting&dta='.base64_encode($v->id))}}">
              <i class="fa fa-cogs" aria-hidden=""></i> </a> &nbsp;&nbsp;
               <a data-toggle='modal' href="#" data-target="#edit{{$v->id_jabatan}}">
                 <i class="fa fa-edit text-warning" aria-hidden=""></i> </a>   &nbsp;&nbsp;
                 <a onclick="return confirm('Yakin untuk menghapus?')" href="{{url('hapusjabatan/'.base64_encode($v->id_jabatan))}}">
                   <i class="fa fa-trash text-danger" aria-hidden=""></i>
                 </a>
              </td>
          </tr>

          <div class="modal fade" id="edit{{$v->id_jabatan}}" role="dialog">
            <div class="modal-dialog modal-md">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Data Jabatan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">
                  <form class="" action="{{url('updatejabatan')}}" method="post">{{csrf_field()}}
                  <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" name="id" value="{{$v->id_jabatan}}">
                  <input type="text" class="form-control" name="jabatan" value="{{$v->jabatan}}">
                </div>
                <ul class="list-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </ul>
                 </form>
                </div>
              </div>
            </div>
                </div>
          @endforeach

        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="tambah" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>


      </div>
      <div class="modal-body">
        <form class="" action="{{url('addjabatan')}}" method="post">{{csrf_field()}}
        <div class="form-group">
          <label>Nama Jabatan</label>
        <input type="text" class="form-control" name="jabatan" value="">
      </div>
      <ul class="list-group">
          <button class="btn btn-primary" type="submit">Simpan</button>
      </ul>
       </form>
      </div>
    </div>
  </div>
      </div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
@endsection
