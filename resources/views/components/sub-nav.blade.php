<div class="sub_navigation">
    @php
        $buttons = json_decode($buttons);
    @endphp
    <ul>

        @foreach($buttons as $buttonx)

                @if(\Request::is($buttonx,$buttonx."/*"))
                    <li>
                        <a href="/{{ $buttonx }}"> {{$buttonx}} </a>
                    </li>
                @else
                    <li>
                        <a href="/{{ $buttonx }}"> {{$buttonx}} </a>
                    </li>
            @endif
        @endforeach

    </ul>
</div>

