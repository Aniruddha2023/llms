@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>User Profile</h3>
            </div>
            <div class="module-body">
                <form id="updateUserForm" class="form-horizontal row-fluid" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="username" value="{{ auth()->user()->username }}" id="name"
                                data-form-field="title" class="span8">
                            <br>
                            <span class="text-danger error-text username_error" style="color: red"></span>
                            <input type="hidden" data-form-field="token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" data-form-field="auth_user"
                                value="{{ auth()->user()->id }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" value="{{ auth()->user()->email }}" name="email" id="author"
                                data-form-field="author" class="span8">
                            <br>
                            <span class="text-danger error-text email_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="author" data-form-field="author" class="span8">
                            <br>
                            <span class="text-danger error-text password_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Confirm Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="author" data-form-field="author"
                                class="span8">
                            <br>
                            <span class="text-danger error-text password_error" style="color: red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-inverse" id="addbooks">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('custom_bottom_script')

    <script type="text/javascript" src="{{ asset('static/custom/js/script.addbook.js') }}"></script>

@stop
