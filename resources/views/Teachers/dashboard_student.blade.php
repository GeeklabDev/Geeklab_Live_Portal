@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="cards-dashboard">
           <a href="{{route('users')}}">
               <div class="card-dashboard">
                   <i class="fa fa-users" aria-hidden="true"></i>
                   <h3>Իմ Ուսանողները</h3>
               </div>
           </a>
           <a href="{{route('lesson')}}">
               <div class="card-dashboard">
                   <i class="fa fa-book" aria-hidden="true"></i>
                   <h3>Իմ դասերը</h3>
               </div>
           </a>
           <a href="{{route('homeworks')}}">
               <div class="card-dashboard">
                   <i class="fa fa-home" aria-hidden="true"></i>
                   <h3>Տնային աշխատանքներ</h3>
               </div>
           </a>

       </div>
   </div>
@endsection
