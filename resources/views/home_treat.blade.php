@extends('backend.lay')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container" >
    <div class="row">
        <legend>Personal Record</legend>
        
            @if (session('info'))
              <div class="alert alert-success">
                 {{ session('info') }}
              </div>
            @endif
          
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
              </tr>
            </thead>

            <tbody>
                @if(count($treatment_records) > 0)
                  @foreach($treatment_records->all() as $treatment_record)
                                      
              <tr class="table-active">
                <td>{{ $treatment_record->record_id }}</td>
                <td>{{ $treatment_record->date }}</td>
                <td>{{ $treatment_record->description }}</td>
                <td>
                  <a href='{{ url("/read/{$treatment_records->record_id}") }}' class="label label-primary"> Read </a>|
                  <a href='{{ url("/update/{$treatment_records->record_id}") }}' class="label label-success"> Update </a>|
                  <a href='{{ url("/delete/{$treatment_record->record_id}") }}' class="label label-danger"> Delete </a>
                </td>
              </tr>
                  @endforeach
               @endif
            </tbody>
          </table> 
    </div>
</div>


@endsection