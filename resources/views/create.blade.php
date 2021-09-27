@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    
</style>

<div class="card push-top">
  <div class="card-header">
    Add Student
  </div>

  <div class="card-body">
      <form method="post" action="{{ route('students.store') }}" onsubmit="return onsubmitForm(this)">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif  
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label><br/>
              <input type="text" class="form-control" required name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label><br/>
              <input type="email" class="form-control" required name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label><br/>
              <input type="tel" class="form-control" required name="phone"/>
          </div>
          <div>
            <label for="course">Course</label><br/>
            <select class="form-control" required name="course">
                <option value="">- Select -</option>
                @if ($courses->count())
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->CourseName }}</option>
                    @endforeach    
                @endif
            </select>
          </div>
          <div class="form-group">

              <br/><label for="sex">Sex</label><br/>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sex" value="m">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sex" value="f">
                <label class="form-check-label" for="inlineRadio1">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="sex" value="o">
                <label class="form-check-label" for="inlineRadio1">Others</label>
              </div>
          </div>
          <div class="form-group">
              <label for="hobbies">Hobbies</label><br/>
              <input type="checkbox" name="hobbies[]" value="singing"> Singing 
              <input type="checkbox" name="hobbies[]" value="dancing"> Dancing 
              <input type="checkbox" name="hobbies[]" value="drawing"> Drawing 
              <input type="checkbox" name="hobbies[]" value="others"> Others <br/>
          </div>
          <div class="form-group">
              <p>Active</p>
              <label for="radio_1">
                <input type="radio" checked name="active" value="yes" />
                Yes
              </label>
              <label for="radio_2">
                <input type="radio" name="active" value="no" />
                No
              </label>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Create Student</button>
      </form>
  </div>
</div>

<script>
  function onsubmitForm(form)
  {
    var ajax = new XMLHttpRequest();
    ajax .open("POST",form.getAttribute("action"),true);
    var formData = new FormData(form);
    ajax.send(formData);

    ajax.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        var data  = JSON.parse(this.responseText);
        alert(data.status+ "-" +data.message);
      }
      if(this.status == 500){
        alert(this.responseText);
      }
    }

  }
</script>

@endsection