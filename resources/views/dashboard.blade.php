@extends('layouts.app')
@section('content')
<div class="flex  flex-col items-center h-screen gap-4">
    <img class="w-[300px]" src="{{url('/img/saccessful.gif')}}" alt="Image" />
    <span class="text-2xl text-[#38D368] font-semibold">You’ve successfully logged in
    </span>
</div>

@endsection
