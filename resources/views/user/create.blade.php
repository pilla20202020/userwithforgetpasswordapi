@extends('layouts.admin.admin')
@if(Auth::user()->hasRole('Staff'))
@section('title', 'Create a Student')
    
@else
@section('title', 'Create a Staff')

@endif

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @include('user.form',['header' => 
            
            'Create a user'])
            </form>
        </div>
    </section>
@endsection

