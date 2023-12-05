<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music List') }}
        </h1>

<h3> Here is the list of your music, {{ auth()->user()->name }}</h3>

<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Add music</a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Music Name</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
          
        </table>
     
        <div>
            <!-- Modal -->
            <div class="modal fade" id="music-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title">Music List</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('add.music')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="music_name" class="col-sm-2 col-form-label">Muic Name</label>
                                    <div class="col-sm-10">
                                        <input type="test" class="form-control" id="music_name">
                                        @error('music_name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                                    <div class="col-sm-10">
                                        <input type="test" class="form-control" id="author">
                                        @error('author')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function add() {
                    $('#music-modal').modal('show');
                }
            </script>

    </x-slot>

</x-app-layout>