<ul class="class1">
    @foreach($items as $menu_item) 
    <li class="class2"><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li> 
    @endforeach
</ul>