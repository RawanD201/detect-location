@extends('layouts.app')
@section('content')
<div class="flex  flex-col items-center h-screen gap-4">
    <img class="w-[300px]" src="{{url('/img/logo.png')}}" alt="Image" />
    <span class="text-2xl text-center text-rose-700 font-semibold block"> ڕێنمایی بۆ بەکارهێنانی بەرنامە *</span>
    <span class="list-disc list-inside text-xl text-center text-indigo-800 font-medium block dir">*پێویستە هەر
        بەکارهێنەرێک لە
        کاتی
        چوونی بۆ هەر شوێنێک
        (Login) بکات </span>

    <span class="list-disc list-inside text-xl text-center text-indigo-800 font-medium block dir">*پێویستە بەکارهێنەر لە
        کاتی تەواو
        بوونی لە هەر شوێنێک (Logout) بکات</span>

</div>

@endsection
