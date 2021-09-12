<div class="sub_navigation">
    @php
        $buttons = json_decode($buttons);
    @endphp
    <ul>

        @foreach($buttons as $buttonx)

                @if(\Request::is($buttonx,$buttonx."/*"))
                    <li style="border-bottom: 2px solid #2DB2E3">
                        <a href="/{{ $buttonx }}"> {{$buttonx}} </a>
                    </li>
                @else
                    <li>
                        <a href="/{{ $buttonx }}"> {{$buttonx}} </a>
                    </li>
            @endif
        @endforeach

    </ul>

    <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>

    <style>
        .sub_navigation > ul{
            display: inline-flex;
            width: 600px;
        }
        .sub_navigation > span{
            float: right;
            padding-right: 10px;
            color: #2DB2E3;
            font-weight: bold;
        }
    </style>
</div>

