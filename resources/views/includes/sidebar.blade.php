<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list" aria-hidden="true"></i>   Category</h3>
    </div>
    <div class="panel-body">
        <table class="table">
        <tbody>
            @foreach($collections as $collection)
            <tr>
                <td><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="{{ url('collection/'.$collection->id) }}" title="">{{ $collection->name }}<span class="badge">{{ count($collection->documents) }}</span></a></td>
            </tr>
            @endforeach                                                            
        </tbody>
        </table>    
    </div>
</div>

<div class="panel panel-success">
    <!-- Default panel contents -->
    <div class="panel-heading"><i class="fa fa-bar-chart" aria-hidden="true"></i>   Tài liệu được thích nhiều nhất</div>
    <div class="panel-body">
    <table class="table">
        <tbody>
        
        @for ($i = 0; $i < count($like_trends); $i++)
            <tr>
                <td>
                    <div class="img-user-info col-xs-3"><img src="{{$doc_trend[$i]->image}}" alt="" class="img-user-trend img-circle"></div>
                    <div class="col-xs-8">
                        <a href="{{ url('document/'.$doc_trend[$i]->id ) }}" title="">{{ $doc_trend[$i]->title }}</a>
                        <div> <i class="fa fa-heart"></i> {{$like_trends[$i]->total}} </div>
                    </div>
                </td>
            </tr>            
        @endfor

        </tbody>
    </table>
</div>
</div>  