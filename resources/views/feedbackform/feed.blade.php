@extends('layouts.app')

@section('content')
<div class="container">
<form class="form" action="/feedbacktest" method="POST">
		
		@csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" maxlength="15" id="name" class="form-control" type="text" placeholder="name">
		</div>
		
		<div class="form-group">
            <label for="email">Email</label>
            <input name="email" maxlength="20" id="email" class="form-control" type="text" placeholder="email">
        </div>
        
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" maxlength="200" id="message" class="form-control" placeholder="message"></textarea>
        </div>
      

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary" >
        </div>
    </form>
</div>
@endsection