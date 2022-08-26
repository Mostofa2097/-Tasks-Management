@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tasks</h1>
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
        <a href="{{ url('/tasks/create')}}" class="btn btn-info float-right">creat a new task</a>
        <table class="table">
          <tr>
            <td>sl</td>
            <td>Title</td>
            <td>description</td>
            <td>Deadline</td>
            <td>catagory</td>
            <td>status</td>
            <td>Action</td>
          </tr>
          @php
              $sl=1;
          @endphp
          @forelse ($tasks as $t)
              <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $t->title }}</td>
                <td>{{ $t->description }}</td>
                <td>{{ $t->deadline }}</td>
                <td>{{ $t->catagory->name }}</td>
                <td>{{ App\Enums\StatusType::getDescription($t->status); }}</td>
                <td>
                  <a href="{{ url("/tasks/$t->id/edit") }}">edit</a>
                  <form action="{{ url("/tasks/$t->id")}}" method="POST" onsubmit="return confirm('korbi')">
                    @csrf
                    @method('delete')
                    <input type="submit" name=" " value="delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
          @empty
              <tr>
                <td colspan="3"> No task found</td>
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