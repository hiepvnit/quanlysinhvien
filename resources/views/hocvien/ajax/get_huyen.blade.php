<option value="">[Chọn huyện]</option>
@if(!empty($huyen))
    @foreach($huyen as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif