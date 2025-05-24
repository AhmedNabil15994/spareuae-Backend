@foreach ($mainCategories as $category)
<ul>
	<li id="{{$category->id}}" data-jstree='{"opened":true
		{{ ($model->category_id ==  $category->id ) ? ',"selected":true' : ''  }} }'>
		{{$category->translate(locale())->title}}
		@if($category->children->count() > 0)
			@include('qsale::dashboard.tree.ads.edit',
                                    ['mainCategories' => $category->children , "model"=> $model]
             )
		@endif
	</li>
</ul>
@endforeach
