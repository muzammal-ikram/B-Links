@if($contractor->buyer_name != Null)
{{--    @if(strlen($contractor->buyer_name) > 20)--}}
{{--            <div id="buyer_more{{$contractor->id}}" name = "buyer_more">--}}
{{--                {{ \Illuminate\Support\Str::limit($contractor->buyer_name, 20, '...') }}--}}
{{--                <p href = "" onclick="showBuyermore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>--}}
{{--            </div>--}}
{{--            <div id="buyer_less{{$contractor->id}}" name = "buyer_less" style="display:none;">--}}
{{--                {{$contractor->buyer_name}}--}}
{{--                <p href = "" onclick="showBuyerless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>--}}
{{--            </div>--}}
{{--    @else--}}
{{--        <div>--}}
{{--            {{$contractor->buyer_name}}--}}
{{--        </div>--}}
{{--    @endif--}}

    <div>
        {{$contractor->buyer_name}}
    </div>

@endif
<script type="text/javascript">
    function showBuyermore($getId){
        document.getElementById("buyer_more"+$getId).style.display = 'none';
        document.getElementById("buyer_less"+$getId).style.display = 'inline';
    }
    function showBuyerless($getId){
        document.getElementById("buyer_less"+$getId).style.display = 'none';
        document.getElementById("buyer_more"+$getId).style.display = 'inline';
    }
</script>
