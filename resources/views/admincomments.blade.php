@extends('layouts.main')

@section('content')

    <!--main content wrapper-->
    <div class="content-wrapper">

    <div class="container-fluid">

        <!-- ALERT!!! -->

        <!--page title-->
        <div class="page-title mb-4 d-flex align-items-center">
            <div class="mr-auto">
                <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Comments</h4>
            </div>
        </div>
        <!--/page title-->

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                    </div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Author</th>
                                    <th>Body</th>
                                    <th></th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($comments as $item)

                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->user_comment }}</td>
                                        <td><a href="{{route('home.post',$item->post_id)}}">View Post</a></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                        <span id="delete" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" data-whatever="@mdo"><i class='fa fa-trash fa-lg'></i></span>
                                        &nbsp;
                                        </td>
                                    </tr>

                                    <?php $no++; ?>

                                  

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
                                            Are you sure you want to delete this comment?
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
                    <h5 class="modal-title" id="exampleModalLabel5">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ url('/admin/posts') }}" method="POST">
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
                                    <input type="text" name="details" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Image:</label>
                                    <input type="file" name="image" class="form-control" required>
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