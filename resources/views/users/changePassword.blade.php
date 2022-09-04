@extends('layouts.app')

@section('content')
<div class="w-full relative h-[90vh] flex items-center justify-center ">

    <div x-cloak x-show="open" class="w-[90%] lg:w-2/6">
        <div class=" rounded-lg p-3 bg-gray-900 dir">





            <form class="flex flex-col gap-1 p-3" action=" {{route('users.changePassword')}}  " method="post">
                @csrf

                @if ($errors->any())
                <div x-data="{ showw: true }" x-show="showw" x-init="setTimeout(() => showw = false, 3000)"
                    class="bg-red-700 w-3/4 lg:w-1/4  p-3 absolute top-1/4 left-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center rounded-lg dir1">
                    <ul class=" list-disc list-inside text-base text-white">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session()->has('success'))
                <div x-data="{ showw: true }" x-show="showw" x-init="setTimeout(() => showw = false, 3000)"
                    class="bg-green-700 w-3/4 lg:w-1/4 p-3 absolute top-1/4 left-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center rounded-lg dir1">
                    <ul class="list-disc list-inside text-base text-white">
                        <li>{{ session()->get('success') }}</li>
                    </ul>
                </div>
                @endif

                <i
                    class="fas fa-user-edit text-3xl text-center flex items-center justify-center flex-col  text-white"></i>
                <span class="text-lg text-center text-white">گۆڕینی وشەی نهێنی</span>
                <div class="relative" x-data="{show:true}">
                    <input class=" border-[1px] text-left border-stone-300 rounded w-full my-1 outline-none h-full
                        p-2" :type="show ? 'password' : 'text'" name="current_password" placeholder="old password">
                    <div x-on:click="showPassword =!showPassword"
                        class="absolute inset-y-0 pr-3 flex items-center cursor-pointer">
                        <i class="contents" @click="show=! show"
                            :class=" show ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash' "></i>

                    </div>
                </div>

                <div class="relative" x-data="{show:true}">
                    <input @error('password') is-invalid @enderror
                        class="border-[1px] text-left border-stone-300 rounded	w-full my-1 outline-none h-full p-2"
                        :type="show ? 'password' : 'text'" name="password" placeholder="new password">
                    <div x-on:click="showPassword =!showPassword"
                        class="absolute inset-y-0 pr-3 flex items-center cursor-pointer">
                        <i class="contents" @click="show=! show"
                            :class=" show ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash' "></i>

                    </div>
                </div>


                <div class="relative" x-data="{show:true}">
                    <input @error('password_confirmation') is-invalid @enderror
                        class="border-[1px] text-left border-stone-300 rounded	w-full my-1 outline-none h-full p-2"
                        :type="show ? 'password' : 'text'" placeholder="confirm new password"
                        name="password_confirmation">
                    <div x-on:click="showPassword =!showPassword"
                        class="absolute inset-y-0 pr-3 flex items-center cursor-pointer">
                        <i class="contents" @click="show=! show"
                            :class=" show ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash' "></i>
                        @error('password_confirmation')
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            <li>{{ $error->password_confirmation }}</li>
                        </ul>
                        @enderror
                    </div>

                </div>
                <button class="text-white text-center p-3 bg-yellow-500 rounded" type="submit"> گۆڕین</button>
            </form>
        </div>
    </div>
</div>
@endsection
