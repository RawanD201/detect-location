@extends('layouts.app')
@section('content')

<body class="flex items-center justify-center ">

    <form class="flex flex-col lg:flex-row items-center px-4 pt-2 gap-2 dir" action="{{route('log')}}">
        <div class="flex gap-2 w-full lg:w-1/5 ">
            <span class="bg-teal-500 text-white text-base rounded p-2 w-1/4 text-center">start
                at</span>
            <input class="rounded  border-teal-500 w-full text-center" type="date" value="{{$startDate}}"
                name="startDate">
        </div>
        <div class="flex gap-2 w-full lg:w-1/5">
            <span class="bg-teal-500 text-white text-base rounded p-2 w-1/4 text-center">end at</span>
            <input class="rounded  border-teal-500 w-full text-center" type="date" value="{{$endDate}}" name="endDate">
        </div>
        <select class="rounded border-teal-500  w-full lg:w-1/5 text-center text-black" name="usr"
            class="form-control @error('status') is-invalid @enderror" id="status">
            @foreach ($users as $user )
            <option value="{{$user->username}}">{{$user->username}}</option>
            @endforeach
        </select>
        <button class="rounded bg-teal-400 p-[9px] w-full lg:w-10"><i
                class="fa-solid fa-magnifying-glass text-white"></i></button>
    </form>
    <div class="px-4 dir">
        <table class="w-full flex flex-col flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dir">
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    {{-- <th class="p-3 text-center">ID</th> --}}
                    <th class="p-3 text-center capitalize">Name</th>
                    <th class="p-3 text-center capitalize">Ip Address</th>
                    <th class="p-3 text-center capitalize">visit place</th>
                    <th class="p-3 text-center capitalize">country</th>
                    <th class="p-3 text-center capitalize">city</th>
                    <th class="p-3 text-center capitalize">county</th>
                    <th class="p-3 text-center capitalize">nearest place</th>
                    <th class="p-3 text-center capitalize">latitude , longitude</th>
                    {{-- <th class="p-3 text-center capitalize"></th> --}}
                    <th class="p-3 text-center capitalize">Login At</th>
                    <th class="p-3 text-center capitalize">Logout At</th>
                    <th class="p-3 text-center capitalize">duration</th>
                    <th class="p-3 text-center capitalize">login map</th>
                    <th class="p-3 text-center capitalize">logout map</th>
                    <th class="p-3 text-center capitalize">google map</th>
                    <th class="p-3 text-center capitalize">google map</th>
                </tr>
            </thead>


            <tbody class=" flex-1 sm:flex-none">
                @foreach($logs as $log)
                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                    {{-- <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->id}}</td> --}}
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
                        <div class="w-full">
                            <a class="text-teal-600 font-medium" href="{{route('log',[
                                'date'=>$startDate,
                                 'user'=>$log->user->username
                             ])}}">{{$log->user->username}}</a>
                        </div>

                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->ip}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[100px] text-center">
                        {{$log->visit_place}}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->country}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->city}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->county}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->name}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-2 text-center">
                        Long: {{$log->longitude}} <br> Lat: {{$log->latitude}}</td>
                    {{-- <td class="border-grey-light border hover:bg-gray-100 p-3 text-center ip_address ">
                    </td> --}}
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center ">{{$log->login_at}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">{{$log->logout_at}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center dir1">
                        {{ $log->login_at->diffForHumans($log->logout_at,true) }}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[200px] text-center"><a
                            href="{{ '/storage/'.$log->login_image }}" target="_blank"><img class="lg:w-[200px]"
                                src="{{URL::to('storage/'.$log->login_image);}}"></a>
                    </td>

                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[200px] text-center"><a
                            href="{{ '/storage/'.$log->logout_image }}" target="_blank"><img class="lg:w-[200px]"
                                src="{{URL::to('storage/'.$log->logout_image);}}"></a>
                    </td>


                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[100px] text-center"><a
                            href="{{$log->login_map}}" target="_blank" class="text-teal-600">Login map</a>
                    </td>


                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[100px] text-center"><a
                            href="{{$log->logout_map}}" target="_blank" class="text-teal-600">Logout map</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4">
        {{ $logs->links() }}
    </div>
</body>

<script>
    if (/ipad|tablet/i.test(navigator.userAgent)) {
    console.log("it's a Ipad"); // your code here
}
else if (/mobile/i.test(navigator.userAgent)) {
     console.log("it's a Mobile");
} else {
     console.log("it's a Desktop");
}


</script>

@endsection
