@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>task</h1>
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
     
          <!-- general form elements -->
           <!-- general form elements -->
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">edit a new catagory</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url("/tasks/$task->id") }}" method="POST">
              @csrf
              @method("PUT")
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">title</label>
                  <input type="text" name="title" class="form-control" id="" placeholder="Enter title" value="{{$task->title}}" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">description</label>
                  <input type="text" name="description" class="form-control" id="" placeholder="Enter description" value="{{$task->description}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">catagory</label>
                    <select name="catagory_id" class="form-control" id="" value="{{$task->catagory}}>
                      <option>--select--</option>
                      @foreach ($catagory_list as $c)
                      <option value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                     
                    </select>
                  
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">status</label>
                    <select name="status" class="form-control" value="{{$task->status}}>
                      <option>--select status--</option>
                      @foreach ($status_list as $key=>$value)
                      <option value="{{ $key}}">{{ $value }}</option>
                      @endforeach
                     
                    </select>
                  
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">deadline</label>
                  <input type="date" name="deadline" class="form-control" value="{{$task->deadline}} id="" placeholder="Enter deadline" >
                </div>

                


              </div>

              

              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">update</button>
            </div>
          </form>
        </div>
          <!-- /.card -->
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