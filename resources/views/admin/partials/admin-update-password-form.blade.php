<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Change Password</h4><br><br>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="current_password" class="col-sm-3 col-form-label">
                            Current Password
                        </label>
                        <div class="col-sm-9">
                            <input id="current_password" name="current_password" type="password" class="form-control"
                                autocomplete="current-password" />
                            @error('current_password', 'updatePassword')
                                <span class="mt-2 text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">
                            New Password
                        </label>
                        <div class="col-sm-9">
                            <input id="password" name="password" type="password" class="form-control"
                                autocomplete="new-password" />
                            @error('password', 'updatePassword')
                                <span class="mt-2 text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">
                            Password Confirmation
                        </label>
                        <div class="col-sm-9">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="form-control" autocomplete="new-password" />
                            @error('password_confirmation', 'updatePassword')
                                <span class="mt-2 text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
