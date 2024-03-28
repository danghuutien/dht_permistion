{{--@include('Form::base.number', [
    'name'				=> $item['name'],
    'value' 			=> $item['value'],
    'required' 			=> $item['required'],
    'label' 			=> $item['label'],
    'placeholder' 		=> $item['placeholder'],
    'has_row' 			=> $item['has_row'],
    'class_col' 		=> $item['class_col'],
    'disable' 			=> $item['disable'],
    'convert_number' 	=> $item['convert_number'],
    'style'             => $item['style'] ?? '',
])--}}

<div class="sm:{{ $class_col ?? '' }} col-span-12 mb-4">
    <div class="relative border border-gray-400 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label for="{{$name??''}}" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white  font-medium text-gray-900">{{$label ?? ''}}</label>
        <input v-model="dataForm['{{$name}}']" type="number" name="{{$name??''}}" id="{{$name??''}}" class="block w-full border-0 p-0 text-gray-900 focus-visible:outline-none placeholder-gray-500 py-1 text-base focus:ring-0" autocomplete="off" placeholder="{{$placeholder ?? ''}}" @if($disable == true) disabled @endif>
        <span class="mt-4 mb-2 text-red-500" v-if="dataForm.errors().has('{{$name}}')">
            {{ dataForm.errors().get('<?php echo $name ?>') }}
        </span>
    </div>
</div>
@section('dataForm')
	{{$name ?? ''}}: "{{$value ?? ''}}",
@endsection
@if($required)
	@section('rules')
		{{$name ?? ''}}: 'required',
	@endsection
	@section('messages')
		'{{$name ?? ''}}.required': 'Trường này bắt buộc nhập',
	@endsection

@endif