@extends('layouts.app')
@section('content')

<body class="flex items-center justify-center ">

    <form class="flex items-center px-4 pt-2 gap-2 dir" action="{{route('log')}}">
        <input class="rounded  border-teal-500  w-1/2 lg:w-1/6 text-center" type="date" value="{{$date}}" name="date">
        <button class="rounded bg-teal-400 p-[9px]"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
    </form>
    <div class="px-4 dir">
        <table class="w-full flex flex-col flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dir">
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    {{-- <th class="p-3 text-center">ID</th> --}}
                    <th class="p-3 text-center capitalize">Name</th>
                    <th class="p-3 text-center capitalize">Ip Address</th>
                    <th class="p-3 text-center capitalize">country</th>
                    <th class="p-3 text-center capitalize">city</th>
                    <th class="p-3 text-center capitalize">county</th>
                    <th class="p-3 text-center capitalize">near place</th>
                    <th class="p-3 text-center capitalize">latitude</th>
                    <th class="p-3 text-center capitalize">longitude</th>
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
                            <a class="text-teal-600  font-medium" href="{{route('log',[
                                'date'=>$date,
                                 'user'=>$log->user->username
                             ])}}">{{$log->user->username}}</a>
                        </div>

                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->ip}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->country}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->city}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->county}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$log->name}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
                        {{$log->longitude}}</td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center ip_address ">
                        {{$log->latitude}}</td>
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


                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[200px] text-center"><a
                            href="{{$log->login_map}}" target="_blank">Login map</a>
                    </td>


                    <td class="border-grey-light border hover:bg-gray-100 p-1 lg:w-[200px] text-center"><a
                            href="{{$log->logout_map}}" target="_blank">Logout map</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
