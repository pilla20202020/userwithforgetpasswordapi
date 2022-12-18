@extends('layouts.admin.admin')

@section('title', 'Create a Today Share Price')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('todayshare.store')}}" method="POST" enctype="multipart/form-data">
            @include('todayshare.partials.form',['header' => 'Create a Today Share Price'])
            </form>
        </div>
    </section>
@endsection

