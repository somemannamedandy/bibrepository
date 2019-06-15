@extends('layouts.app')

@section('content')
    <?php $is_admin = false;?>
   @if($this_user->role_id == 1)
        <?php $is_admin = true; print('admin');?>
       @else
       <?php $is_admin = false?>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               @if($is_admin)
                <div class="panel-heading">Admin Dashboard</div>
                @else
                    <div class="panel-heading">User Dashboard</div>
                @endif
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{$this_user->firstname.' '.$this_user->lastname}}! <a href="{{url('/')}}">zie alle boeken</a>
                    @if($is_admin)
                            <div class="accordion" id="accordionExample" style="overflow-y:scroll; max-height: 500px;">
                        @foreach($users as $user)

                        <div class="card">
                            <div class="card-header" id="{{$user->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$user->id.$user->firstname}}" aria-expanded="true" aria-controls="collapseOne">
                                      {{$user->firstname.' '.$user->lastname}}
                                    </button>
                                </h2>
                            </div>

                            <div id="{{$user->id.$user->firstname}}" class="collapse" aria-labelledby="{{$user->id}}" data-parent="#accordionExample">
                                <div class="card-body" >
                                    <ul class="list-group"style="overflow-y:scroll; max-height:500px;">
                                    @foreach($c_rented_books as $crb)
                                        @if( $user->id == $crb->rented_id)
                                            <li class="list-group-item text-left p-1 d-flex">{{$crb->titel}}
                                                <span class="ml-2">{{$crb->auteur}}</span>
                                                <span class="ml-2 text-danger ml-auto">return before: {{$crb->return_date}}</span>
                                            </li>
                                            @endif
                                        @endforeach
                                    <hr>
                                    history:
                                        <hr>
                                    @foreach($rent_history as $rh)
                                        @if($user->id == $rh->ontlener_id)
                                            <li class="list-group-item text-left p-1 d-flex">{{$rh->titel}}
                                                <span class="ml-5">{{$rh->auteur}}</span>
                                             </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                            @endforeach
                            </div>
                        @else{{--user content--}}
                            <div class="card">
                                <div class="card-header" id="{{$this_user->id}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#{{$this_user->id.$this_user->firstname}}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$this_user->firstname.' '.$this_user->lastname}}
                                        </button>
                                    </h2>
                                </div>

                                <div id="{{$this_user->id.$this_user->firstname}}" class="collapse" aria-labelledby="{{$this_user->id}}" data-parent="#accordionExample">
                                    <div class="card-body" >
                                        <ul class="list-group"style="overflow-y:scroll; max-height:500px;">
                                            @foreach($c_rented_books as $crb)
                                                @if( $this_user->id == $crb->rented_id)
                                                    <li class="list-group-item text-left p-1 d-flex">{{$crb->titel}}
                                                        <span class="ml-2">{{$crb->auteur}}</span>
                                                        <span class="ml-auto text-danger">return before: {{$crb->return_date}}</span>
                                                        <button class="btn btn-danger">return</button>
                                                    </li>
                                                @endif
                                            @endforeach
                                            <hr>
                                            history:
                                            <hr>
                                            @foreach($rent_history as $rh)
                                                @if($this_user->id == $rh->ontlener_id)
                                                    <li class="list-group-item text-left p-1 d-flex">{{$rh->titel}}
                                                        <span class="ml-5">{{$rh->auteur}}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
