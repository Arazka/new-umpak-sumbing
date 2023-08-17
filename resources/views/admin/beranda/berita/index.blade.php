@extends('layouts.admin')

@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
          </nav>
      </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a class="btn btn-primary" href="{{ url('admin/create') }}">Tambah data</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>
                  <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button>
                </td>
              </tr>
              <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>
                  <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button>
                </td>
              </tr>
              <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>
                  <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button>
                </td>
              </tr>
              <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>
                  <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button>
                </td>
              </tr>
              <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>
                  <button type="button" class="btn btn-primary"><i class="bi bi-folder-fill"></i></button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                  <button type="button" class="btn btn-success"><i class="bi bi-pencil-fill"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection