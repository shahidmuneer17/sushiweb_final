@extends('admin.layouts.admin')

@section('content')

<section class="container">
    <div class="row">
        <div class="col-12">
            <h1>Create New User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form id="myForm" method="POST" action="{{route('admin.users.create.post')}}">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>

                            <select name="role" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="manager">Manager</option>
                                <option value="cashier">Cashier</option>
                                <option value="kitchen">Kitchen</option>
                                <option value="rider">Rider</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Restaurent</label>

                            <select name="rest_id" class="form-select" aria-label="Default select example" required>
                                <option selected>Select Restaurent</option>
                                <option value="1">Central Sushi Dijon</option>
                                <option value="2">Central Sushi Besancon</option>
                                <option value="3">Central Sushi Belfort</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

@endsection