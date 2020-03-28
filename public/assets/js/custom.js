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

$('#ViewModal').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var bookingID = button.data('booking')
      var guestname = button.data('guest')
      var age = button.data('age')
      var email = button.data('email')
      var contact = button.data('contact')
      var address = button.data('address')
      var roomCategory = button.data('rcategory')
      var roomID = button.data('roomid')
      var cin = button.data('in')
      var cout = button.data('out')
      var nights = button.data('night')
      var ppstatus = button.data('pstatus')
      var bbstatus = button.data('bstatus')
      var pprice = button.data('price')
      var ttotal = button.data('total')
      var bbfee = button.data('bfee')
      var bbalance = button.data('balance')
      var gadult = button.data('adult')
      var gchildren = button.data('children')
      var b_id = button.data('booking_id')
      var p_id = button.data('payment_id')
      var modal = $(this)
      modal.find('.modal-body #booking_id').val(bookingID);
      modal.find('.modal-body #gguest').val(guestname);
      modal.find('.modal-body #gage').val(age);
      modal.find('.modal-body #gemail').val(email);
      modal.find('.modal-body #gcontact').val(contact);
      modal.find('.modal-body #gaddress').val(address);
      modal.find('.modal-body #room_category').val(roomCategory);
      modal.find('.modal-body #room_id').val(roomID);
      modal.find('.modal-body #from').val(cin);
      modal.find('.modal-body #to').val(cout);
      modal.find('.modal-body #nnight').val(nights);
      modal.find('.modal-body #pstatus').val(ppstatus);
      modal.find('.modal-body #bstatus').val(bbstatus);
      modal.find('.modal-body #rprice').val(pprice);
      modal.find('.modal-body #balance').val(bbalance);
      modal.find('.modal-body #b_fee').val(bbfee);
      modal.find('.modal-body #total').val(ttotal);
      modal.find('.modal-body #aa').val(gadult);
      modal.find('.modal-body #cc').val(gchildren);
      modal.find('.modal-footer #booking_id').val(b_id);
      modal.find('.modal-footer #payment_id').val(p_id);

    });
$('#ViewTrashed').on('show.bs.modal',function(event){
      var button = $(event.relatedTarget)
      var bookingID = button.data('booking')
      var guestname = button.data('guest')
      var age = button.data('age')
      var email = button.data('email')
      var contact = button.data('contact')
      var address = button.data('address')
      var roomCategory = button.data('rcategory')
      var roomID = button.data('roomid')
      var cin = button.data('in')
      var cout = button.data('out')
      var nights = button.data('night')
      var ppstatus = button.data('pstatus')
      var bbstatus = button.data('bstatus')
      var pprice = button.data('price')
      var ttotal = button.data('total')
      var bbfee = button.data('bfee')
      var bbalance = button.data('balance')
      var gadult = button.data('adult')
      var gchildren = button.data('children')
      var b_id = button.data('booking_id')
      var p_id = button.data('payment_id')
      var modal = $(this)
      modal.find('.modal-body #booking_id').val(bookingID);
      modal.find('.modal-body #gguest').val(guestname);
      modal.find('.modal-body #gage').val(age);
      modal.find('.modal-body #gemail').val(email);
      modal.find('.modal-body #gcontact').val(contact);
      modal.find('.modal-body #gaddress').val(address);
      modal.find('.modal-body #room_category').val(roomCategory);
      modal.find('.modal-body #room_id').val(roomID);
      modal.find('.modal-body #from').val(cin);
      modal.find('.modal-body #to').val(cout);
      modal.find('.modal-body #nnight').val(nights);
      modal.find('.modal-body #pstatus').val(ppstatus);
      modal.find('.modal-body #bstatus').val(bbstatus);
      modal.find('.modal-body #rprice').val(pprice);
      modal.find('.modal-body #balance').val(bbalance);
      modal.find('.modal-body #b_fee').val(bbfee);
      modal.find('.modal-body #total').val(ttotal);
      modal.find('.modal-body #aa').val(gadult);
      modal.find('.modal-body #cc').val(gchildren);
      modal.find('.modal-footer #booking_id').val(b_id);
      modal.find('.modal-footer #payment_id').val(p_id);

    });