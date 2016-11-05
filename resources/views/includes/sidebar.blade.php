<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list" aria-hidden="true"></i>   Category</h3>
    </div>
    <div class="panel-body">
        <table class="table">
        <tbody>
        @if (count($collections))
            @foreach ($collections as $collection)
                <tr>
                    <td><i class="fa fa-graduation-cap" aria-hidden="true"></i><a href="#" title="">  {{$collection->name}}</a></td>
                </tr>                
            @endforeach
        @endif                                                               
        </tbody>
        </table>    
    </div>
</div>

<div class="panel panel-success">
    <!-- Default panel contents -->
    <div class="panel-heading"><i class="fa fa-bar-chart" aria-hidden="true"></i>   Thành viên tích cực</div>
    <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div class="img-user-info col-xs-3"><img src="https://cdn2.iconfinder.com/data/icons/designer-skills/128/linux-server-system-platform-os-computer-penguin-128.png" alt="" class="img-user-trend img-circle"></div>
                    <div class="col-xs-8">
                        <div>Minh Phu Nguyen</div>
                        <div> <i class="fa fa-heart"></i> 500 </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>  