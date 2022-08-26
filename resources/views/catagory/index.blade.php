@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>catagories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{ url('/catagories/create')}}" class="btn btn-info float-right">creat a new catagory</a>
        <table class="table">
          <tr>
            <td>sl</td>
            <td>Name</td>
            <td>Action</td>
          </tr>
          @php
              $sl=1;
          @endphp
          @forelse ($catagory_list as $c)
              <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $c->name }}</td>
                <td>
                  <a href="{{ url("/catagories/$c->id/edit") }}">edit</a>
                  <form action="{{ url("/catagories/$c->id")}}" method="POST" onsubmit="return confirm('korbi')">
                    @csrf
                    @method('delete')
                    <input type="submit" name=" " value="delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
          @empty
              <tr>
                <td colspan="3"> No catagory found</td>
              </tr>
          @endforelse
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection