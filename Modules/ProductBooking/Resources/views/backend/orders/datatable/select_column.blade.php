
@php
$booking_status = ['confirmed' , 'pending' , 'cancelled'] ;
@endphp

@if($data->status != 'completed')
<select name="branch_for" class="select2 change-select" data-token="{{csrf_token()}}" data-url="{{route('backend.orders.updateStatus', ['id' => $data->id, 'action_type' => 'update-status'])}}" style="width: 100%;">
  @foreach ($booking_status as $key => $value )
 
    <option value="{{$value}}" {{$data->status == $value ? 'selected' : ''}} data-color="">{{$value}}</option>
  @endforeach
</select>
@else
@php
$color = $booking_colors->where('sub_type', $data->status)->first()->name;
@endphp
<span class="text-capitalize"><i class="fa-solid fa-circle" style="color: {{ $color }}"></i> {{ $data->status }}</span>
@endif
