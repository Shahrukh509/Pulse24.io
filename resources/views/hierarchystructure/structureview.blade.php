@extends('layouts.main')


@push('css')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">

@endpush

@section('content')


<div class="tf-tree example tree">
    <ul>
        <li>
            <a href="{{ route('search.history',$admin->id) }}">
            <span class="tf-nc touch" data-id="{{ $admin->id }}">{{$admin->name}}
            </span>
            </a>
            <ul>
                @php $data1 = \App\Models\User::where('linemanager_id',$admin->id)->where('name','!=','admin')->get(); @endphp
                @if(!empty($data1))
                @foreach($data1 as $data1)
                <li>
                    <a href="{{ route('search.history',$data1->id) }}">
                    <span class="tf-nc touch " data-id="{{ $data1->id }}">{{$data1->name}}</span>
                </a>

                    @php $data2 = \App\Models\User::where('linemanager_id',$data1->id)->get(); @endphp
                    @if(!empty($data2))
                    @foreach($data2 as $data2)
                    <ul>

                        <li>
                            <a href="{{ route('search.history',$data2->id) }}">
                            <span class="tf-nc touch" data-id="{{ $data2->id }}">{{$data2->name}}
                            </span>
                        </a>

                            @php $data3 = \App\Models\User::where('linemanager_id',$data2->id)->get(); @endphp
                            @if(!empty($data3))
                            <ul>
                                @foreach($data3 as $data3)


                                <li>
                                    <a href="{{ route('search.history',$data3->id) }}">
                                    <span class="tf-nc touch" data-id="{{ $data3->id }}">{{$data3->name}}
                                    </span>
                                </a>

                                    @php $data4 = \App\Models\User::where('linemanager_id',$data3->id)->get(); @endphp
                                    @if(!empty($data4))
                                    <ul>
                                        @foreach($data4 as $data4)

                                        <li>
                                            <a href="{{ route('search.history',$data4->id) }}">
                                                <span class="tf-nc touch" data-id="{{ $data4->id }}">{{$data4->name}}
                                            </span>
                                        </a>





                                            @endforeach
                                    </ul>
                                    @endif

                                </li>


                                @endforeach()
                            </ul>
                            @endif()


                        </li>




                    </ul>

                    @endforeach
                    @endif

                </li>
                @endforeach
                @endif

            </ul>
        </li>
    </ul>
</div>


@endsection
@push('js')

{{-- <script type="text/javascript">
    
    $('.touch').click(function(event){
        var id =  $(this).attr('data-id');

        alert(id);
    });
</script> --}}
@endpush