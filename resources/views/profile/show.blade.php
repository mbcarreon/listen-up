<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <p><img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        <h3>Name: {{ auth()->user()->name }}</h3>
        <p>Bio: {{ auth()->user()->bio }}</p>
        <p>Location: {{ auth()->user()->location }}</p>
        <p>Birthdate: {{ auth()->user()->birthdate }}</p>

        <a onClick="update()" href="javascript:void(0)" class="btn btn-info">Set up Profile</a>
        <a href="}" class="btn btn-danger">Remove</a>
        </td>

        <div>
            <!-- Modal -->
            <div class="modal fade" id="set-up-profile" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Set up Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.update-profile') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bio" name="bio">
                                        @error('bio')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="location" name="location">
                                        @error('location')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="birthdate" class="col-sm-2 col-form-label">Birth date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                                        @error('birthdate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="profile_image" name="profile_image">
                                        @error('profile_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">update</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                function update() {
                    $('#name').val('{{ auth()->user()->name }}');
                    $('#bio').val('{{ auth()->user()->bio }}');
                    $('#location').val('{{ auth()->user()->location }}');
                    $('#birthdate').val('{{ auth()->user()->birthdate }}');
                    $('#set-up-profile').modal('show');
                }
            </script>

    </x-slot>
</x-app-layout>