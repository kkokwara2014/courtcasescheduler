@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('equipment.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Equipment
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('equipment.update',$equipments->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="form-group">
                                <label for="">equipment # <b style="color: red;">*</b> </label>
                                <input style="background-color: dodgerblue; color:floralwhite" type="text" class="form-control" name="equipnumber" 
                                    value="{{$equipments->equipnumber}}">
                            </div>
                            <div class="form-group">
                                <label for="">Equipment Name <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="equipname" placeholder="Equipment Name"
                                    autofocus value="{{$equipments->equipname}}">
                            </div>
                            <div class="form-group">
                                <label for="">Make <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="make" placeholder="Make"
                                    autofocus value="{{$equipments->make}}">
                            </div>
                            <div class="form-group">
                                <label for="">Purchase Date <b style="color: red;">*</b> </label>
                                <input type="text" class="form-control" name="purchasedate" placeholder="Purchase Date"
                                    id="datepicker" value="{{$equipments->purchasedate}}">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option selected="disabled">Select Status</option>
                                   
                                    <option >Faulty</option>
                                    <option >Ok</option>
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Location</label>
                                <select name="location_id" class="form-control">
                                    <option selected="disabled">Select Location</option>
                                    @foreach ($locations as $location)

                                    <option value="{{$location->id}}"
                                        {{$location->id==$equipments->location_id ? 'selected':''}}>
                                        {{$location->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('equipment.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
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