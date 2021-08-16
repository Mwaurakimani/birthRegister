<select name="{{$name}}" id="">
    @foreach($options as $option)
        <option value="{{ $option }}" {{ $selected == $option ? 'selected' : '' }}> {{$option}}</option>
    @endforeach
</select>
