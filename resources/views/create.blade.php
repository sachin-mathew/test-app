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
              <label for="radio_1">
                <input type="radio" checked name="sex" value="m" />
                Male
              </label>
              <label for="radio_2">
                <input type="radio" name="sex" value="f" />
                Female
              </label>
              <label for="radio_3">
                <input type="radio" name="sex" value="o" />
                Others
              </label>
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
@endsection