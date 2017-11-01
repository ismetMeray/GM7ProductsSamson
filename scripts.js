
var modalEdit = function($(document).ready(function(){
    $(".input-bx").on('focus', 'input',function(){
        $('label[for='+$(this).attr('id')+']').addClass('input-bx-label');
        $(".input-bx input").addClass('input-bx-focus');
    });

    $(".input-bx input").on('blur',function(){
      if($(this).val()!="")
      {
        $(this)
          .addClass('input-bx-focus-out-true')
          .removeClass('input-bx-focus-out-false');
      }
      else
      {
        $(this)
          .addClass('input-bx-focus-out-false')
          .removeClass('input-bx-focus-out-true');
      }
    }));
$('#login-modal').modal('show');
});

var selectRowData = function(clicked_id){
  var serial = "";
  var productName = "";
  var date = null;
  var comment = "";

    serial = document.getElementById('serial' + clicked_id).innerHTML;
    productName = document.getElementById('productName' + clicked_id).innerHTML;
    date = document.getElementById('date' + clicked_id).innerHTML;
    comment = document.getElementById('comment' + clicked_id).innerHTML;
    console.log(date);

    $("#serialField").val(serial);
    $("#productNameField").val(productName);
    $("#dateField").val(date);
    $("#commentField").val(comment);
};
