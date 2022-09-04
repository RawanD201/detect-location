@extends('layouts.app')
@section('content')

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


<!-- add modal -->
<div id="default-modal" data-modal-show="false" aria-hidden="false"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative dark:bg-gray-900">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                    Add User
                </h3>
                <div class="flex gap-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="default-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex items-center gap-2 p-2">
                        <button type="reset" onclick="form.reset();"
                            class="text-white p-2 w-full  justify-center text-xl bg-cyan-500 rounded duration-[250ms] hover:shadow-2xl ease-in-out transition-all translate-y-0	 hover:translate-y-[-5px]  flex items-center g-4  "><i
                                class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="flex flex-col lg:flex-row dir p-2 gap-2">
                <div class="w-full">
                    <div class="w-full flex flex-col lg:w-full">
                        <div class=" rounded-lg p-2">
                            <div>

                                <form action="{{route('users.store')}}" name="form" method="post"
                                    class=" grid grid-cols-4 gap-2">
                                    @csrf
                                    <span class="w-full text-white">ناوی تەواو</span>
                                    <input type="text"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="name" placeholder="ناو" required>
                                    <span class="w-full text-white">بەکارهێنەر</span>
                                    <input type="text"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="username" placeholder="بەکارهێنەر" required>
                                    <span class="w-full text-white">ژ. مۆبایل</span>
                                    <input type="number"
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black"
                                        name="phone" placeholder="ژ. مۆبایل" required>
                                    <span class="w-full text-white ">کارایە</span>
                                    <select
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black "
                                        name="status" class="form-control @error('status') is-invalid @enderror"
                                        id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                    <span class="w-full text-white ">ڕۆڵ</span>
                                    <select
                                        class="col-span-3 outline-none rounded p-1 text-base text-center text-black "
                                        name="role" class="form-control @error('status') is-invalid @enderror"
                                        id="status">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-toggle="default-modal" type="submit"
                    class="text-white p-1 w-full lg:w-1/4 lg:h-10  justify-center text-xl bg-blue-600 hover:bg-blue-700 rounded flex items-center g-4 "><i
                        class="fa-solid fa-angles-left"></i>زیادکردن</button>
            </div>
            </form>
        </div>
    </div>
</div>


















<div class="w-full p-2 responsive ">
    <table class="text-center w-full dir">
        <thead class="bg-gray-900 flex text-white w-full rounded ">
            <tr class="flex w-full">
                {{-- <th class="p-4 w-1/4 flex items-center justify-center">زنجیرە</th> --}}
                <th class="p-4 w-[21%] flex items-center justify-center">ناوی تەواو</th>
                <th class="p-4 w-[23%] flex items-center justify-center">بەکارهێنەر</th>
                <th class="p-4 w-[23%] flex items-center justify-center">ژ. مۆبایل </th>
                <th class="p-4 w-[15%] flex items-center justify-center">کارایە</th>
                <th class="p-4 w-[15%] flex items-center justify-center">ڕۆڵ</th>
                <th class="p-4 w-[23%]">
                    <!-- Modal toggle -->
                    <button
                        class="block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-modal-toggle="default-modal">
                        Add Users
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="bg-grey-light flex flex-col items-center overflow-y-scroll w-full shadow-xl"
            style="height: 83vh;">
            @foreach($users as $user)
            <tr class="flex w-full  hover:bg-gray-200 ">
                {{-- <td class="p-4 w-1/4">{{$user->id}}</td> --}}
                <td class="p-4 w-[22%]">{{$user->name}}</td>
                <td class="p-4 w-[22%]">{{$user->username}}</td>
                <td class="p-4 w-[22%]">{{$user->phone}}</td>
                <td class="p-4 w-[15%]">
                    @if($user->status === 1)
                    <label class="py-2 px-3 bg-green-600 text-white rounded">active</label>
                    @elseif($user->status === 0)
                    <label class="py-2 px-3 bg-red-600 text-white rounded">banned</label>
                    @endif


                </td>

                <td class="p-4 w-[15%]">
                    @if($user->isAdmin())
                    <label class="py-2 px-3 bg-blue-600 text-white rounded">Admin</label>
                    @else
                    <label class="py-2 px-3 bg-blue-600 text-white rounded">User</label>
                    @endif


                </td>
                <td class="p-4 w-[22%]">
                    <button type="button" data-modal-toggle="edit-modal-{{$user->id}}" id="cancel-button-{{$user->id}}">
                        <div class="flex item-center justify-center">
                            <div class="w-5 mr-2 transform hover:text-blue-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                    </button>
                    @include('users.edit')
</div>

<button type="button" data-modal-toggle="delete-modal-{{$user->id}}">
    <div class="w-5 mr-2 transform hover:text-rose-500 hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </div>
</button>


<div id="delete-modal-{{$user->id}}" data-modal-show="false" aria-hidden="false"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="bg-white border shadow-md px-16 py-14 rounded-md text-center">
        <div class="text-center p-5 flex-auto justify-center">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto"
                viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <h1 class="text-xl mb-4 font-bold text-slate-500">Do you Want Delete</h1>
        <div class="flex gap-3">
            <button data-modal-toggle="delete-modal-{{$user->id}}"
                class="bg-red-500 px-4 py-2 rounded-md text-md text-white">Cancle</button>
            <form action="{{ route('users.delete', [ 'id' => $user->id ]) }}" method="post">
                @csrf
                @method('delete')
                <button class="bg-indigo-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">Ok</button>
            </form>
        </div>
    </div>
</div>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection
