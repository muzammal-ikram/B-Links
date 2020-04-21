@if($contractor->lc_opener_name != Null)
    @if(strlen($contractor->lc_opener_name) > 20)
            <div id="opener_more{{$contractor->id}}" name = "opener_more">
                {{ \Illuminate\Support\Str::limit($contractor->lc_opener_name, 20, '...') }}
                <p href = "" onclick="showOpenermore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>
            </div>
            <div id="opener_less{{$contractor->id}}" name = "opener_less" style="display:none;">
                {{$contractor->lc_opener_name}}
                <p href = "" onclick="showOpenerless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>
            </div>
    @else
        <div>
            {{$contractor->lc_opener_name}}
        </div>
    @endif
@endif
<script type="text/javascript">
    function showOpenermore($getId){
        document.getElementById("opener_more"+$getId).style.display = 'none';
        document.getElementById("opener_less"+$getId).style.display = 'inline';
    }
    function showOpenerless($getId){
        document.getElementById("opener_less"+$getId).style.display = 'none';
        document.getElementById("opener_more"+$getId).style.display = 'inline';
    }
</script>
