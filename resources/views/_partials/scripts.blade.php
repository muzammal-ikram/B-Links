<script>
    $(document).ready(function(){
    $('#select-commission').click(function(){
        let select_commission =  document.getElementById("select-commission").value;
        if(select_commission == 'kg'){
            document.getElementById("kg-input").style.display = "inline";
            document.getElementById("percent-input").style.display = "none";
            document.getElementById("percent_commission").value = ""
        }
        else{
            document.getElementById("percent-input").style.display = "inline";
            document.getElementById("kg-input").style.display = "none";
            document.getElementById("kgs_commission").value = ""
        }
    });
    // ******* SELLER NAME **************
    $('#sellers_name').keyup(function () {
        var query = $(this).val();
        var usersList = {};
        if (query !== '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('seller-names') }}",
                method: 'GET',
                data: {seller:query, _token:_token},
                success:function (data) {
                    $('#sellersSuggestion').fadeIn();
                    $('#sellersSuggestion').html(data);
                    usersList = data;
                }
            });
        }
        else
        {
            $('#sellersSuggestion').fadeOut();
        }
    });
    // **********SELLER SUGGESTIONS**************
    $("#sellersSuggestion").on('click', 'li', function() {

    $('#sellers_name').val($(this).text());
    $('#sellers_name').attr('value', $(this).text());
    $("#seller-id").attr({"value":$(this).children("input").attr('value')});//.val($(this).text());
    var seller_id = $("#seller-id").val();
    // if(seller_id){
    //     getSellerInfo(seller_id);
    // }
    $('#sellersSuggestion').fadeOut();
    });

    // *****BUYER Name***************

    $('#buyer_name').keyup(function () {
        var query = $(this).val();
        if (query !== '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('buyer-names') }}",
                method: 'GET',
                data: {buyer:query, _token:_token},
                success:function (data) {
                    $('#buyerSuggestion').fadeIn();
                    $('#buyerSuggestion').html(data);
                }
            });
        }
        else
        {
            $('#buyerSuggestion').fadeOut();
        }
    });

    // **********Buyer SUGGESTIONS**************
    $("#buyerSuggestion").on('click', 'li', function() {

        $('#buyer_name').val($(this).text());
        $('#buyer_name').attr('value', $(this).text());
        $("#buyer-id").attr({"value":$(this).children("input").attr('value')});//.val($(this).text());
        var buyer_id = $("#buyer-id").val();
        // if(buyer_id){
        //     getBuyerInfo(buyer_id);
        // }
        $('#buyerSuggestion').fadeOut();
    });

    $('#lc_opener_name').keyup(function () {
        var query = $(this).val();
        var usersList = {};
        if (query !== '')
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('lc-opener-names') }}",
                method: 'GET',
                data: {opener:query, _token:_token},
                success:function (data) {
                    $('#openerSuggestion').fadeIn();
                    $('#openerSuggestion').html(data);
                    usersList = data;
                }
            });
        }
        else
        {
            $('#openerSuggestion').fadeOut();
        }
    });

    $('#etd_fcls').keyup(function () {
        var etd_fcls = $(this).val();
        var fcls = $("#fcls").val();

        if(etd_fcls == '' || fcls == ''){
            return;
        }
       var etd_rest = fcls - etd_fcls;
       etd_rest = etd_rest.toFixed(2)
       document.getElementById("etd_rest_hide").value = etd_rest;
       document.getElementById("etd_rest_show").value = etd_rest;
    });

    $('#eta_fcls').keyup(function () {
        var eta_fcls = $(this).val();
        var fcls = $("#fcls").val();
        if(eta_fcls == '' || fcls == ''){
            return;
        }
       var eta_rest = fcls - eta_fcls;
       eta_rest = eta_rest.toFixed(2)
       document.getElementById("eta_rest_show").value = eta_rest;
       document.getElementById("eta_rest_hide").value = eta_rest;
    });


      // **********Opener SUGGESTIONS**************
      $("#openerSuggestion").on('click', 'li', function() {

            $('#lc_opener_name').val($(this).text());
            $('#lc_opener_name').attr('value', $(this).text());
            $("#opener-id").attr({"value":$(this).children("input").attr('value')});//.val($(this).text());
            var opener_id = $("#opener-id").val();
            // if(opener_id){
            //     getOpenerInfo(opener_id);
            // }
            $('#openerSuggestion').fadeOut();
        });

});

function getSellerInfo(seller_id){
    var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('seller-info') }}",
                method: 'GET',
                data: {seller_id:seller_id, _token:_token},
                success:function (data) {
                    document.getElementById("seller_address").value = data.seller_address;
                    document.getElementById("seller_country").value = data.seller_country;

                    document.getElementById("seller_address").disabled = true;
                    document.getElementById("seller_country").disabled = true;

                }
            });
}

function getBuyerInfo(buyer_id){
    var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('buyer-info') }}",
                method: 'GET',
                data: {buyer_id:buyer_id, _token:_token},
                success:function (data) {
                    document.getElementById("buyer_address").value = data.buyer_address;
                    document.getElementById("buyer_country").value = data.buyer_country;

                    document.getElementById("buyer_address").disabled = true;
                    document.getElementById("buyer_country").disabled = true;
                }
            });
}


function getOpenerInfo(opener_id){
    var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('opener-info') }}",
                method: 'GET',
                data: {opener_id:opener_id, _token:_token},
                success:function (data) {
                    document.getElementById("lc_opener_address").value = data.lc_opener_address;
                    document.getElementById("lc_opener_country").value = data.lc_opener_country;

                    document.getElementById("lc_opener_address").disabled = true;
                    document.getElementById("lc_opener_country").disabled = true;
                }
            });
}


$(document).on('click', function() {
    $('#sellersSuggestion').fadeOut();
    $('#buyerSuggestion').fadeOut();
    $('#openerSuggestion').fadeOut();
})
var c = 2;
function Clone() {

    var clone = document.getElementById('thediv').cloneNode(true); // "deep" clone
    $(clone). attr("id", "thediv"+c);
    document.getElementById("showHere").appendChild(clone);
    c++;
}
function Delete(button) {
  var parent = button.parentNode;
  var grand_father = parent.parentNode;
  grand_father.removeChild(parent);
}
$(document).ready(function() {

    var count = 0;
  
    // $(".add-more").click(function(){ 
    //       if(count == 0){
    //           document.getElementById("clone1").style.display = "block";
    //           return;
    //       }
    //       var html = $(".clone").html();
    //       $(".add-more-invoice").after(html);
    //       count++;
    //   });

    var editCount = 0;
    $(".edit-more").click(function(){

        editCount++;
        if(count === 1){
            document.getElementById("copy-area").style.display = "block";
            return;
        }
        var html = $("#copy-area").html();
        $("#copy-area:last").after(html);
    });

    r_count = 0;
//     $("body").on("click",".remove",function(){

//         var numItems = $('.clone_divs').length;
//         if(numItems === 1){
//             return;
//         }
// // alert(numItems)
//         $(this).parents(".control-group").remove();

//         // count--;
//         console.log(count)
//     });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    $(document).keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            return false;
        }
    });

});


function totalAmount(){
    var price_dollar = $("#price_per_dollar").val();
    var qty = $("#qty_show").val();
    if(price_dollar == '' || qty == ''){
    document.getElementById('total_amount_show').value = '';
    document.getElementById('total_amount_hide').value = '';
        return;
    }
    var total =  price_dollar * qty;
    total = total.toFixed(2);
    document.getElementById('total_amount_show').value = total;
    document.getElementById('total_amount_hide').value = total;
}
function totalCommission(){
    var commission_type = $("#select-commission").val();

    if(commission_type == 'kg'){
        CommissionPerKg();
    }
    if(commission_type == 'percent'){
        CommissionPercentage();
    }
}
function CommissionPerKg(){
    var qty = $("#qty_show").val();
    var kgs = $("#kgs_commission").val();
    if(qty == '' || kgs == ''){
        document.getElementById('commission_amount_show').value = '';
        document.getElementById('commission_amount_hide').value = '';
        return;
    }
    var commission =  qty * kgs;
    commission = commission / 100;
    commission = commission.toFixed(2);
    document.getElementById('commission_amount_show').value = commission;
    document.getElementById('commission_amount_hide').value = commission;
}

function CommissionPercentage(){
    var total_amount = $("#total_amount_hide").val();
    var percent_commission = $("#percent_commission").val();

    if(total_amount == '' || percent_commission == ''){
        document.getElementById('commission_amount_show').value = '';
        document.getElementById('commission_amount_hide').value = '';
        return;
    }
    var commission =  total_amount * percent_commission;
    commission = commission / 100;
    commission = commission.toFixed(2);
    document.getElementById('commission_amount_show').value = commission;
    document.getElementById('commission_amount_hide').value = commission;
}






// $(document).ready(function(){
//         $(".add-more").click(function(){
//             $("#add-more-invoice").append('<div class="card control-group clone">'+
//                 '<h5 class="card-header h5">Extra invoice</h5>'+
//                     '<div class="card-body">'+
//                                                 '<div >'+

//                                                     '<div >'+
//                                                         '<div class="row ">'+

//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<label for="validationCustom04">Invoice Number</label>'+
//                                                                 '<input type="text" name="invoice_number_add[]" class="form-control {{ $errors->has('invoice_number') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('invoice_number')}}" autocomplete="off">'+
//                                                                 '<div class="invalid-feedback">Please provide a Invoice Number'+
//                                                                 '</div>'+
//                                                             '</div>'+

//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<label for="validationCustom01">BL Number</label>'+
//                                                                 '<input type="text" name="bl_number_add[]" class="form-control {{ $errors->has('bl_number') ? ' is-invalid' : '' }}" id="validationCustom01" value="{{old('bl_number')}}" autocomplete="off">'+
//                                                                 '<div class="invalid-feedback">\Please provide a BL Number'+
//                                                                 '</div>'+
//                                                             '</div>'+
//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<label for="validationCustom01">No Of FCLS:</label>'+
//                                                                 '<input type="number" step="any" name="invoice_fcls_add[]" class="form-control" value="" autocomplete="off">'+

//                                                             '</div>'+
 
//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<label for="validationCustom04">ETD</label>'+
//                                                                 '<input type="date" name="etd_date_add[]" class="form-control {{ $errors->has('etd') ? ' is-invalid' : '' }}" id="validationCustom04" value="" autocomplete="off">'+
//                                                                 '<div class="invalid-feedback">Please provide a ETD.'+
//                                                                 '</div>'+
//                                                             '</div>'+

//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<label for="validationCustom04">ETA</label>'+
//                                                                 '<input type="date" name="eta_date_add[]" class="form-control {{ $errors->has('eta') ? ' is-invalid' : '' }}" id="validationCustom04" value="{{old('eta')}}" autocomplete="off">'+
//                                                                 '<div class="invalid-feedback">Please provide a ETA.'+
//                                                                 '</div>'+
//                                                             '</div>'+
//                                                             '<div class="col-md-2 mb-3">'+
//                                                                 '<div class="copy hide">'+
//                                                                     '<label for="validationCustom01"></label>'+
//                                                                     '<div class="input-group">'+
//                                                                         '<div class="input-group-btn">'+
//                                                                             '<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>'+
//                                                                         '</div>'+
//                                                                     '</div>'+
//                                                                 '</div>'+
//                                                             '</div>'+ 
//                                                         '</div>'+ 
//                                                     '</div>'+

//                                                   '</div>'+
//                                                 '</div>'+
//                                             '</div>'); 
//         });
//         $(document).on("click", "a.remove" , function() {
//             $(this).parent().remove();
//         });
//     });

</script>
