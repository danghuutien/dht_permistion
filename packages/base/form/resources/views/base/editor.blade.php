{{-- 
	@include('Form::base.editor', [
    	'name'				=> $item['name'],
		'value' 			=> $item['value'],
		'required' 			=> $item['required'],
		'label' 			=> $item['label'],
    ])
--}}
<label for="{{$name ?? ''}}">{{$label ?? ''}}</label>
<textarea v-model="dataForm.{{ $name ?? ''}}" name="{{ $name ?? '' }}" id="{{ $name ?? '' }}">{{$value ?? ''}}</textarea>

<script>
    const editor = document.getElementById('{{$name??''}}')
	initEditor(editor)
</script>
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