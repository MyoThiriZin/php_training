$(function () {
    const realPath = "http://127.0.0.1:8000/";
    $.ajax({
      type: 'GET',
      url: realPath + 'api/apistudents',
      success: function(result) {
        result.forEach(student => {
          $('tbody').append(
            `<tr id=${student.id}>
                <td>${student.id}</td>
                <td>${student.first_name}</td>
                <td>${student.last_name}</td>
                <td>${student.email}</td>
                <td>${student.phone}</td>
                <td>${student.address}</td>
                <td>${student.major}</td>
                <td>${student.created_at}</td>
                <td> 
                  <a href="students/${student.id}/edit" class="btn btn-primary btn-sm me-2">Edit</a>
                  <button class="btn btn-danger btn-sm delete" data-id="${student.id}">Delete</button>
                </td>
              <tr>`
          );
        });
      }
    });
    $(document).on("click",'.delete' , function() {
      let id = $(this).attr("data-id");
      $.ajax({
        url: realPath + 'api/apistudents/'+ id,
        method: 'DELETE',
        success: function() {
            $("#"+id).remove();
        }
      });
    });
});
//  
//alert("HELLO")
//
//console.log("WOrld");