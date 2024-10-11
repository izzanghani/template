@extends('layouts.admin')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables / User</span> / Edit</h4>
    <div class="card mb-4 " style="border-radius: 30px; max-width: 80%; ">
        <div class="card-body pt-2 mt-1" >
            <form id="formAccountSettings" method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT') <!-- Hidden method field for PUT request -->

                <div class="row mt-2 gy-4">
                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus placeholder="Enter your username">
                            <label for="name">Username</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="Enter your email">
                            <label for="email">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-password-toggle">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="password" class="form-control" name="password"
                                       placeholder="Password" autocomplete="new-password" />
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating form-floating-outline">
                            <select id="isAdmin" class="select2 form-select @error('isAdmin') is-invalid @enderror" name="isAdmin" required>
                                <option value="">Select Role</option>
                                <option value="0" {{ old('isAdmin', $user->isAdmin) == '0' ? 'selected' : '' }}>User</option>
                                <option value="1" {{ old('isAdmin', $user->isAdmin) == '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <label for="isAdmin">Role</label>
                            @error('isAdmin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2 waves-effect waves-light" style="border-radius: 30px">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect" style="border-radius: 30px">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
