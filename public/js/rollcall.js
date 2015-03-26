// function for datepicker
$(function() {
  $( "#datepicker" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
});


function getList() {
  var name_list = [];
  var name_api = "http://128.199.158.31/ws/v1/users";
  $.ajax({
      url: name_api,
      dataType: "json"
    })
     .done(function( data ) {
           $.each( data.users, function( i, user) {
              name_list.push(user.username);
           });         
     });
    return name_list;
}

//function for autocomplete
$(function() {
  var list = getList();
  $( "#username" ).autocomplete({
    source: list
  });
});


