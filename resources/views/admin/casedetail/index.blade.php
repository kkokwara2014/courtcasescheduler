@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Register Case
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Case #</th>
                                   <th>Offender</th>
                                   <th>Offense</th>
                                   <th>Gender</th>
                                   <th>Phone</th>
                                   <th>Residence</th>
                                   <th>Additional Info.</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($casedetails as $casedetail)
                                <tr>
                                    <td>{{$casedetail->equipnumber}}</td>
                                    <td>{{$casedetail->equipname}}</td>
                                    <td>{{$casedetail->make}}</td>
                                    <td>{{$casedetail->purchasedate}}</td>
                                    <td>{{$casedetail->status}}</td>
                                    <td>{{$casedetail->location->name}}</td>
                                    

                                    <td><a href="{{ route('casedetail.edit',$casedetail->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$casedetail->id}}" style="display: none"
                                            action="{{ route('casedetail.destroy',$casedetail->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$casedetail->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Case #</th>
                                    <th>Offender</th>
                                    <th>Offense</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Residence</th>
                                    <th>Additional Info.</th>
                                     <th>Edit</th>
                                     <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">

                <form action="{{ route('casedetail.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-tags"></span> Add Equipment</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Equipment # </label>
                                <input style="background-color: dodgerblue; color:floralwhite" type="text" class="form-control" name="equipnumber" readonly value="{{'EQ'. rand(55000, 99955)}}">
                            </div>
                            <div class="form-group">
                                <label for="">Equipment Name <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="equipname" placeholder="Equipment Name"
                                    autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Make <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="make" placeholder="Make"
                                    autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Purchase Date <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="purchasedate" placeholder="Purchase Date"
                                    id="datepicker">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option selected="disabled">Select Status</option>
                                   
                                    <option>Faulty</option>
                                    <option>Ok</option>
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Location</label>
                                <select name="location_id" class="form-control">
                                    <option selected="disabled">Select Location</option>
                                    @foreach ($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->

                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    {{-- <section class="col-lg-5 connectedSortable"> --}}


    {{-- </section> --}}
    <!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection