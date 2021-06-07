<?php $tag=\App\Models\Tag::find($id)?>
<div class="avatar">
    <a class="avatar" href="{{asset('/images_profile/'.$tag->image)}}" data-fancybox>
        <img class="avatar-img rounded" alt="User Image" src="{{asset('/images_profile/'.$tag->image)}}">
    </a>
</div>
