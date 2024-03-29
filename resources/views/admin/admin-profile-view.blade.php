@extends('admin.admin-master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl"
                                src="{{ !empty($user->profile_image) ? url('upload/admin_images/' . $user->profile_image) : url('upload/no_image.jpg') }}"
                                alt="Card image cap">
                        </center>

                        <div class="card-body">
                            <h4 class="card-title">Name : {{ $user->name }} </h4>
                            <hr>
                            <h4 class="card-title">User Email : {{ $user->email }} </h4>
                            <hr>
                            <h4 class="card-title">User Name : {{ $user->username }} </h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">
                                Edit Profile</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
