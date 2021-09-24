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
    Edit & Update
  </div>

  <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
      <form method="post" action="{{ route('students.update', $student->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $student->email }}"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" value="{{ $student->phone }}"/>
          </div>
          <div class="form-group">
              <label for="course">Course</label>
              <select class="form-control" required name="course">
                  <option value="">- Select -</option>
                  @if ($courses->count())
                      @foreach($courses as $course)
                          <option value="{{ $course->id }}" {{ $student->course == $course->id ? 'selected="selected"' : '' }}>{{ $course->CourseName }}</option>
                      @endforeach    
                  @endif
              </select>
          </div>
          <div class="form-group">
              <br/><label for="sex">Sex</label><br/>
              <label for="radio_1">
                <input type="radio" {{ $student->sex == 'male' ? 'checked' : '' }} name="sex" value="male" />
                Male
              </label>
              <label for="radio_2">
                <input type="radio" {{ $student->sex == 'female' ? 'checked' : '' }} name="sex" value="female" />
                Female
              </label>
              <label for="radio_3">
                <input type="radio" {{ $student->sex == 'others' ? 'checked' : '' }} name="sex" value="others" />
                Others
              </label>
          </div>
          <div class="form-group">
              <label for="hobbies">Hobbies</label><br/>
              <?php $hobbies=explode(", ",$student->hobbies); ?>
              <input type="checkbox" {{ in_array('singing', $hobbies) ? 'checked' : '' }} name="hobbies[]" value="singing"> Singing 
              <input type="checkbox" {{ in_array('dancing', $hobbies) ? 'checked' : '' }} name="hobbies[]" value="dancing"> Dancing 
              <input type="checkbox" {{ in_array('drawing', $hobbies) ? 'checked' : '' }} name="hobbies[]" value="drawing"> Drawing 
              <input type="checkbox" {{ in_array('others', $hobbies) ? 'checked' : '' }} name="hobbies[]" value="others"> Others <br/>
          </div>
          <div class="form-group">
              <p>Active</p>
              <label for="radio_1">
                <input type="radio" {{ $student->active == 'yes' ? 'checked' : '' }} name="active" value="yes" />
                Yes
              </label>
              <label for="radio_2">
                <input type="radio" {{ $student->active == 'no' ? 'checked' : '' }} name="active" value="no" />
                No
              </label>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Update Student</button>
      </form>
  </div>
</div>
@endsection