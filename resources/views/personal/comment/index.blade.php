@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
{{--                        <li class="breadcrumb-item active">Post v1</li>--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Post content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->message }}</td>
                                        <td class="text-center"><a href="{{ route('personal.comment.edit', $comment->id) }}"
                                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.comment.edit', $comment->id) }}"
                                                                   class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('personal.liked.delete', $comment->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
