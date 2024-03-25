@foreach ($data_form as $item)
    @switch($item['form_type'])
        @case('row')
            <div class="grid grid-cols-12 gap-2">
        @break
        @case('endRow')
            </div>
        @break
        @case('text')
            @include('Form::base.text', [
                'name'				=> $item['name'],
                'value' 			=> $item['value'],
                'required' 			=> $item['required'],
                'label' 			=> $item['label'],
                'placeholder' 		=> $item['placeholder'],
                'class_col' 		=> $item['class_col'],
                'disable' 			=> $item['disable'],
            ])
        @break
        @case('number')
            @include('Form::base.number', [
                'name'				=> $item['name'],
                'value' 			=> $item['value'],
                'required' 			=> $item['required'],
                'label' 			=> $item['label'],
                'placeholder' 		=> $item['placeholder'],
                'class_col' 		=> $item['class_col'],
                'disable' 			=> $item['disable'],
            ])
        @break
        @case('editor') 
            @include('Form::base.editor', [
                'name'				=> $item['name'],
                'value' 			=> $item['value'],
                'required' 			=> $item['required'],
                'label' 			=> $item['label'],
                'has_row' 			=> $item['has_row'],
                'class_col' 		=> $item['class_col'],
            ])
        @break
    @endswitch
@endforeach