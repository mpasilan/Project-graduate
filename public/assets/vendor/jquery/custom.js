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

    $("#table_row_id tr").click(function() {
        var id = $(this)
            .closest("tr")
            .attr("id");
        var rowId = "#" + id;

        var ticketId = $(rowId)
            .children("td")
            .children("input")
            .val();
        console.log(ticketId);

        window.location = window.location + "/ticket/" + ticketId;
    });
});
