    @if($contractor->seller_name != Null)
{{--        @if(strlen($contractor->seller_name) > 20)--}}
{{--                <div id="more{{$contractor->id}}" name = "more">--}}
{{--                    {{ \Illuminate\Support\Str::limit($contractor->seller_name, 20, '...') }}--}}
{{--                    <p href = "" onclick="showmore({{$contractor->id}});" style="cursor: pointer;color: lightblue;">more</p>--}}
{{--                </div>--}}
{{--                <div id="less{{$contractor->id}}" name = "less" style="display:none;">--}}
{{--                    {{$contractor->seller_name}}--}}
{{--                    <p href = "" onclick="showless({{$contractor->id}});" style="cursor: pointer; color: lightblue;">less</p>--}}
{{--                </div>--}}
{{--        @else--}}
{{--            <div>--}}
{{--                {{$contractor->seller_name}}--}}
{{--            </div>--}}
{{--        @endif--}}
        <div>
            {{$contractor->seller_name}}
        </div>
    @endif
<script type="text/javascript">
    function showmore($getId){
        document.getElementById("more"+$getId).style.display = 'none';
        document.getElementById("less"+$getId).style.display = 'inline';
    }
    function showless($getId){
        document.getElementById("less"+$getId).style.display = 'none';
        document.getElementById("more"+$getId).style.display = 'inline';
    }
</script>
