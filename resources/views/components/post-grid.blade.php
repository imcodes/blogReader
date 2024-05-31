{{dd($post)}}
{{-- {{dd($slot)}} --}}
{{-- @dd($recentPost) --}}
<div class="row">
    @foreach ($post as $pot)
    {{-- @dd($post) --}}
        <x-post-item :post="$pot"/>
    @endforeach
 </div>
