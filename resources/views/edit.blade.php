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
    
      <form method="post" action="{{ route('students.update', $student->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" name="name" value="{{ $student->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" value="{{ $student->email }}"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" name="phone" value="{{ $student->phone }}"/>
          </div>
          <div class="form-group">
              <label for="course">Course</label>
              <select class="m-bot15" required name="course">
                  <option value="">- Select -</option>
                  @if ($courses->count())
                      @foreach($courses as $course)
                          <option value="{{ $course->id }}" {{ $student->course == $course->id ? 'selected="selected"' : '' }}>{{ $course->CourseName }}</option>
                      @endforeach    
                  @endif
              </select>
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
              <p >Sex</p>
              <label for="radio_1">
                <input type="radio" {{ $student->sex == 'm' ? 'checked' : '' }} name="sex" value="m" />
                Male
              </label>
              <label for="radio_2">
                <input type="radio" {{ $student->sex == 'f' ? 'checked' : '' }} name="sex" value="f" />
                Female
              </label>
              <label for="radio_3">
                <input type="radio" {{ $student->sex == 'o' ? 'checked' : '' }} name="sex" value="o" />
                Others
              </label>
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