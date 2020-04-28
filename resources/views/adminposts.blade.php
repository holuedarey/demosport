@extends('layouts.main')

@section('content')

    <!--main content wrapper-->
    <div class="content-wrapper">

    <div class="container-fluid">

        <!-- ALERT!!! -->

        <!--page title-->
        <div class="page-title mb-4 d-flex align-items-center">
            <div class="mr-auto">
                <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Posts</h4>
            </div>
        </div>
        <!--/page title-->

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Post</button>

                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Owner</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Created</th>
                                    <th>Comments</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts as $item)

                                    <tr>
                                        <td>{{ $no }}</td>
                                                                                                                      <td> @if(ends_with($item->image, 'jpg')||ends_with($item->image, 'png')||ends_with($item->image, 'JPG')||ends_with($item->image, 'jpeg')||ends_with($item->image, 'svg'))<img height="50" data-toggle="modal" data-target="#myModal" src="{{ asset($item->image) }}" width="60"/> @else<video height="50" data-toggle="modal" data-target="#myModal" src="{{ asset($item->image) }}" width="60" preload controls loop />@endif</td>


                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><a href="{{route('home.comment',$item->id)}}">View Comments</a></td>
                                        <td>
                                        <span id="delete" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" data-whatever="@mdo"><i class='fa fa-trash fa-lg'></i></span>
                                        &nbsp;
                                            
                                        </td>
                                    </tr>

                                    <?php $no++; ?>



                                    <!--========= MODAL EDIT PRODUCT  ============-->

                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel5">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="/admin/posts/{{ $item->id }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="_method" value="PUT">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Title:</label>
                                                                <input type="text" name="title" class="form-control" value="{{ $item->name }}" required>
                                                            </div>
                                                        </div>
                                                       

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Details:</label>
                                                                <input type="text" name="details" class="form-control" value="{{ $item->email }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="col-form-label">Photo:</label>
                                                                <input type="file" name="image" class="form-control" value="{{ $item->password }}" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!--============== //END ===============-->

                            <!--========= MODAL DELETE PRODUCT  ============-->
                            <div id="exampleModal{{ $item->id }}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this Post!
                                        </div>

                                        <form action="/admin/posts/{{ $item->id }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="_method" value="DELETE">
                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--============== //END ===============-->

                            <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-responsive" src="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!--========= MODAL ADD PRODUCT  ============-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Add New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/admin/posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                           

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Details:</label>
                                    <textarea  name="details" class="form-control" rows="10">  </textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image:</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--============== //END ===============-->

@endsection

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script>
      $(document).ready(function () {
    $('img').on('click', function () {
        var image = $(this).attr('src');
        $('#myModal').on('show.bs.modal', function () {
            $(".img-responsive").attr("src", image);
        });
    });
});
    </script>



    