<div id="myHTMLDiv">adaklsdaksljd
</div>
<form method="post" action="{{url('docs')}}">
    @csrf
    <input type="hidden" name="htmlstring" id="htmlstring" value="">
    <input type="submit" id="MyButton" value="Generate Docx">
   </form>
   ...

   <script>
   $('#myButton').click(function(){
      //get your Div HTML tring
      var s = $('#myHTMLDiv').html();
      $('#htmlstring').val(s);
   });
   </script>