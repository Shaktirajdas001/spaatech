@extends('layouts.app')

@section('content')
<div class="container">
    
<form class="form-inline fltr-row " type="get" action="{{ route('home') }}">               
                                
                                

                               <?php if(!empty($_GET['name'])){ $name = $_GET['name'];}else{ $name='';  } ?> 
                                
                                <div class="fltr-srch form-group">                   
                                        <input type="search" name="name" value="<?=$name?>" id="name" class="form-control  fltr-txt-bx @error('name') is-invalid @enderror"  placeholder="Search User" width="180px">
                                        
                                        <button type="submit" class="btn btn-primary " name="search" value="search">search</button>
                                </div>
                                    
 </form>
    <div class="row justify-content-center">
        <div class="col-md-12">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                            @endif
                             
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                 @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('post') }}">Add new post</a>                                    
                  @endif

            </div>
            @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img  src="{{ asset('public/images') }}/{{$post->image}}" width="100px">
                    <div class="card-body">
                    <h5 class="card-title">{{$post->username}}</h5>
                    <p class="card-text">{{$post->name}}</p>
                    @if($post->follow == 1)             
                      &nbsp;<a  class="btn btn-danger " href="{{url('status/0')}}/{{$post->id}}">Unfollow</a>
                      @elseif($post->follow == 0)
                      &nbsp;<a  class="btn btn-primary " href="{{url('status/1')}}/{{$post->id}}">Follow</a>
                      @endif
                   
                    </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
