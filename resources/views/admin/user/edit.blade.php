@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing users</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.user.update', $user->id) }}" class="w-25" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name of user"
                                       value="{{ $user->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Enter email"
                                       value="{{ $user->email }}">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Choose role</label>
                                    <select class="form-control" name="role">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}" {{ $id == $user->role ? ' selected': ''}}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
