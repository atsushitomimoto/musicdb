<h1>
    @unless(($text ?? '') == "")
        {{$text.' '}}
    @endunless
    <a href="{{URL::asset('/release/'.$id)}}" class="text-black">{{$title}}</a>
    @unless(($artist ?? '') == "")
        {{' - '.$artist}}
    @endunless
</h1>