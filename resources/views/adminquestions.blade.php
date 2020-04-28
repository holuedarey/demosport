@extends('layouts.main')

@section('content')

<!--main content wrapper-->
<div class="content-wrapper">

  <div class="container-fluid">

    <!-- ALERT!!! -->

    <!--page title-->
    <div class="page-title mb-4 d-flex align-items-center">
      <div class="mr-auto">
        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Questions</h4>
      </div>
    </div>
    <!--/page title-->

    <div class="row">
      <div class="col-xl-12">
        <div class="card card-shadow mb-4">
          <div class="card-header border-0">
            <div class="custom-title-wrap bar-primary">

              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
                data-whatever="@mdo">Add New Question</button>

            </div>
          </div>
          <div class="card-body- pt-3 pb-4">
            <div class="table-responsive">
              <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Questions</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Answer</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($questions as $item)

                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $item->question }}</td>
                    <td>{{ $item->optiona }}</td>
                    <td>{{ $item->optionb }}</td>
                    <td>{{ $item->optionc }}</td>
                    <td>{{ $item->optiond }}</td>
                    <td>{{ $item->answer }}</td>
                    <td>
                      <span id="delete" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"
                        data-whatever="@mdo"><i class='fa fa-trash fa-lg'></i></span>
                      &nbsp;
                      <span id="pendInvoice" data-toggle="modal" data-target="#editModal{{ $item->id }}"
                        data-whatever="@mdo"><i class='fa fa-gear fa-lg'></i></span>
                    </td>
                  </tr>

                  <?php $no++; ?>

                  <!--========= MODAL EDIT PRODUCT  ============-->

                  <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel5" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel5">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <form action="/admin/questions/{{ $item->id }}" method="POST">
                            @csrf

                            <input type="hidden" name="_method" value="PUT">

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label">Name:</label>
                                  <input type="text" name="name" class="form-control" value="{{ $item->name }}"
                                    required>
                                </div>
                              </div>


                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label">Email:</label>
                                  <input type="text" name="email" class="form-control" value="{{ $item->email }}"
                                    required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="col-form-label">Password:</label>
                                  <input type="password" name="password" class="form-control"
                                    value="{{ $item->password }}" required>
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
                  <div id="exampleModal{{ $item->id }}" class="modal fade bd-example-modal-sm" tabindex="-1"
                    role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="mySmallModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this Question?
                        </div>

                        <form action="/admin/questions/{{ $item->id }}" method="POST">
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel5">Add New Question</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ url('/admin/questions') }}" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Question:</label>
                  <textarea name="question" class="form-control" rows="10">  </textarea>                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Option A:</label>
                  <input type="text" name="optiona" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Option B:</label>
                  <input type="text" name="optionb" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                              <div class="form-group">
                                <label class="col-form-label">Option C:</label>
                                <input type="text" name="optionc" class="form-control" required>
                              </div>
                            </div>

                            <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="col-form-label">Option D:</label>
                                              <input type="text" name="optiond" class="form-control" required>
                                            </div>
                                          </div>

                                          <div class="col-md-6">
                                                          <div class="form-group">
                                                            <label class="col-form-label">Answer</label>
                                                            <input type="text" name="answer" class="form-control" required>
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