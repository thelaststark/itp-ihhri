@extends('backend.lay')

@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

    <link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-6">
      <form class="form-horizontal" method="POST" action="{{ url('/insert') }}" enctype="multipart/form-data">
       {{ csrf_field() }}
         <fieldset>
           <legend>Personal Record</legend>
            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      {{ $error }}
                  </div>    
                @endforeach
            @endif
          
            <div class="form-group">
             Date of advice :<input type="date" class="form-control-file" name="date" value="" required>
           </div>
           
           <div class="form-group">
             <label>Patient_ID</label>
             <input type="string" class="form-control" id="pid" name="patient_id" placeholder="Enter Patient_id">
           </div>

           <div class="form-group">
             <label>Disease</label>
             <textarea class="form-control" id="Disease" name="disease" rows="3"></textarea>
           </div>

           <div class="form-group">
               <label>Description about disease</label>
               <textarea class="form-control" id="Description" name="description" rows="3"></textarea>
           </div>

           <button type="submit" class="btn btn-primary">Submit</button>
           <button type="reset" class="btn btn-primary">Cancel</button>
           <a href="{{ url('/home_per') }}" class="btn btn-primary">Back</a>
         </fieldset>
       </form>
      </div>
    </div>
  </div>

@endsection