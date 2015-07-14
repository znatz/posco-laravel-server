@section('contents')
    @foreach($items as $item)
    <li>{{$item->title}}</li>
    @endforeach
    @stop