@extends('layouts.app')
@section('content')

<body class="flex items-center justify-center ">

    <form class="flex items-center px-4 pt-2 gap-2 dir" action="{{route('report')}}">
        <input class="rounded  border-teal-500  w-1/2 lg:w-1/6 text-center" type="date" value="{{$date}}" name="date" />
        <button class="rounded bg-teal-400 p-[9px]"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
    </form>
    <div class="px-4 dir">
        <table class="w-full flex flex-col flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5 dir">
            <thead class="text-white">
                <tr
                    class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    <th class="p-3 text-center capitalize">Username</th>
                    <th class="p-3 text-center capitalize">Total Duration</th>
                    <th class="p-3 text-center capitalize"></th>

                </tr>
            </thead>


            <tbody class=" flex-1 sm:flex-none">
                @foreach($rows as $row)
                <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"> {{$row['username']}}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center dir1"> {{$row['durations']}}
                    </td>
                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center"><a
                            class="text-teal-600 capitalize font-medium" href=" {{route('log',[ 'date'=>$date,
                            'user'=>$row['username']
                            ])}}">View More</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection
