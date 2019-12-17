@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Service Report
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
                                    <th>Service #</th>
                                   <th>Equipment</th>
                                   <th>Service Date</th>
                                   <th>Service Due Date</th>
                                   <th>Reason</th>
                                   <th>Serviced By</th>
                                   <th>Phone</th>
                                   <th>Status</th>
                                   
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicereports as $servicereport)
                                <tr>
                                    <td>{{$servicereport->servicenum}}</td>
                                    <td>{{$servicereport->equipment->equipname}}</td>
                                    <td>{{$servicereport->servicedate}}</td>
                                    <td>{{$servicereport->serviceduedate}}</td>
                                    <td>{{$servicereport->servicereason}}</td>
                                    <td>{{$servicereport->servicedby}}</td>
                                    <td>{{$servicereport->phone}}</td>
                                    <td>
                                        @if (date("d-m-Y",strtotime($servicereport->servicedate))< date("d-m-Y",strtotime($servicereport->serviceduedate)))
                                            <span class="badge badge-pill" style="background-color: green; color:honeydew">Not Due</span>
                                        @else
                                        <span class="badge badge-pill" style="background-color: red; color:honeydew">Service Due</span>
                                        @endif
                                    </td>
                                   
                                    

                                    <td><a href="{{ route('servicereport.edit',$servicereport->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$servicereport->id}}" style="display: none"
                                            action="{{ route('servicereport.destroy',$servicereport->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$servicereport->id}}').submit();
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
                                    <th>Service #</th>
                                   <th>Equipment</th>
                                   <th>Service Date</th>
                                   <th>Service Due Date</th>
                                   <th>Reason</th>
                                   <th>Serviced By</th>
                                   <th>Phone</th>
                                   <th>Status</th>
                                  
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
            <div class="modal-dialog modal-lg">

                <form action="{{ route('servicereport.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fa fa-file-pdf-o"></span> Add Service Report</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Service # </label>
                                <input style="background-color: coral; color:floralwhite" type="text" class="form-control" name="servicenum" readonly value="{{'SER'. rand(55000, 99955)}}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Equipment</label>
                                        <select name="equipment_id" class="form-control">
                                            <option selected="disabled">Select Equipment</option>
                                            @foreach ($equipments as $equipment)
                                            <option value="{{$equipment->id}}">{{$equipment->equipname.' - '.$equipment->equipnumber}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Date <b style="color: red;">*</b> </label>
                                        <input type="text" class="form-control" name="servicedate" placeholder="Service Date"
                                            id="datepicker">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Due Date <b style="color: red;">*</b> </label>
                                        <input type="text" class="form-control" name="serviceduedate" placeholder="Service Due Date"
                                            id="datepicker2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Reason <b style="color: red;">*</b> </label>
                                        <textarea class="form-control" name="servicereason" id="" cols="30" rows="1"></textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">Serviced By <b style="color: red;">*</b> </label>
                                        <input type="text" class="form-control" name="servicedby" placeholder="Serviced By"
                                          autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone <b style="color: red;">*</b> </label>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                                          autofocus>
                                    </div>
                                </div>
                            </div>

                            
                          
                            
                        
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