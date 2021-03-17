@extends('frontend.layouts.master')
@section('content')
  <div class="page-header">
  </div>
  <div class="container-fluid">
    <div class="row">
      @foreach ($user as $u)  
      <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
        <div class="card custom-card">
          <div class="card-header"></div>
          <a href="{{route('user.edit',$u->id)}}">
            <div class="card-profile"><img class="rounded-circle" src="{{asset($u->img ? Storage::url('/user/'.$u->img) : '/assets/images/user/user.png')}}" alt=""></div>
            <div class="text-center profile-details">
              <h4>{{$u->name}}</h4>
            </a>
            <h6>{{$u->role == 'head' ? 'Head Office' : $u->role}}</h6>
            <p>Gudang : {{$u->gudang->name}}</p>
          
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
