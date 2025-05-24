@php
$attributes = buildFieldAttributes($fieldAttributes??[] , [
"placeholder" => $label,
"class" => "form-control file_upload_preview",
"data-name" => $name,
"data-preview-file-type" => "text",
"id" => $name
]);
@endphp
<div class="form-group " id="{{$name}}_wrap">

 <label for="{{$name}}" class="col-md-2" style="">
  {{$label}}
 </label>

 <div class="col-md-9" style="">
  {!! Form::file($name, $attributes) !!}

  <span class="holder" style="margin-top:15px;max-height:100px;">
   @if($value)
   <img src="{{$value}}" style="height: 15rem;">
   @endif
  </span>

 </div>

</div>
