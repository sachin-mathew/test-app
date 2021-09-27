@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a class="btn btn-success" href="{{route('students.create')}}">Create New</a><br/><br/>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Sex</td>
          <td>Course</td>
          <td>Active</td>
          <td>Hobbies</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($student as $students)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$students->name}}</td>
            <td>{{$students->email}}</td>
            <td>{{$students->phone}}</td>
            <td>{{$students->sex}}</td>
            <td>{{$students->course}}</td>
            <td>{{$students->active}}</td>
            <td>{{$students->hobbies}}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $students->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('students.destroy', $students->id)}}" method="post" style="display: inline-block">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

<script>
  function onsubmitForm(form)
  {
    var ajax = new XMLHttpRequest();
    ajax .open("POST",form.getAttribute("action"),true);
    
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