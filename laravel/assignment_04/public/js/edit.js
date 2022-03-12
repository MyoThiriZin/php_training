let id = location.href.split('/')[5];
console.log(id);
$(function () {
  const realPath = "http://127.0.0.1:8000/";
 

  $.ajax({
    url: '/api/majors',
    method: 'GET',
    success: function (data) {
      console.log(data);
        if (data) {
            data.forEach(major => {
                $('select').append(
                    `<option value="${major.id}">${major.name}</option>`
                );
            });
        }
    }
});


  $.ajax({
    url: realPath + 'api/apistudents/'+ id ,
    methot: 'GET',
    success: function (data) {
      console.log(data);
      if(data) {
        $.each(data, function (key, value) {
          $(`#${key}`).val(value);
        });
        console.log(data);
        $(`select option[value="${data.major_id}"]`).attr("selected","selected");
      //  $('select').append(
      //    `<option value="${data.major_id}">${data.major_id}</option>`
      //);
        console.log(data.major_id);
      }
    }
  });
  $('#submit').on('click', function(e){
    e.preventDefault();
    $.ajax({
      url: realPath + "api/apistudents/" + id,
      type: 'PUT',
      data: $('#form').serialize(),
      success: function() {
        window.location.replace('http://127.0.0.1:8000/ajax/students');
      }      
    })
  })
})