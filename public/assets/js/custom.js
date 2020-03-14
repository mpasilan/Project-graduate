$(document).ready(function() {
    $("#repeatPassword").keyup(function() {
        if ($("#repeatPassword").val() === $("#inputPassword").val()) {
            document.getElementById("registerButton").style.display = "block";
            $("#repeatPassword")
                .addClass("is-valid")
                .removeClass("is-invalid");
        } else {
            document.getElementById("registerButton").style.display = "none";
            $("#repeatPassword")
                .addClass("is-invalid")
                .removeClass("is-valid");
        }
    });

    $(".modalButton").click(function() {
        var id = $(this)
            .closest("tr")
            .attr("id");
        var trId = "#" + id;
        var rowId = $(trId)
            .children(".rowID")
            .children(".custId")
            .val();

        var subject = $(trId)
            .children(".rowSub")
            .text();
        var description = $(trId)
            .children(".rowDesc")
            .text();
        var priority = $(trId)
            .children(".rowPrio")
            .text();
        var status = $(trId)
            .children(".rowStat")
            .text();
        var assign = $(trId)
            .children(".rowAssign")
            .text();

        if (assign == "None") {
            assign = "";
        }

        $("#SubModalId").val(subject);
        $("#DescModalId").val(description);
        $("#selectPrioId")
            .val(priority)
            .change();

        $("#selectStatId")
            .val(status)
            .change();
        $("#selectEmpId")
            .val(assign)
            .change();
        $("#custId")
            .val(rowId)
            .change();
    });
    
});

$('#DeleteModal').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var u_id = button.data('uid')
      var u_name = button.data('uname')
      var modal = $(this)
      modal.find('.modal-body #u_id').val(u_id);
      modal.find('.modal-body #u_name').val(u_name);

    });
$('#EditModal').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var u_id = button.data('uid')
      var u_name = button.data('uname')
      var u_email = button.data('email')
      var u_role = button.data('role')
      var modal = $(this)
      modal.find('.modal-body #u_id').val(u_id);
      modal.find('.modal-body #name').val(u_name);
      modal.find('.modal-body #email').val(u_email);
      modal.find('.modal-body #user_role').val(u_role);

    });

$('#DeleteBooking').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var booking = button.data('booking')
      var booking_id = button.data('bid')
      var modal = $(this)
      modal.find('.modal-body #booking').val(booking);
      modal.find('.modal-body #booking_id').val(booking_id);
    });
