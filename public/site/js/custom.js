  $( function() {
 	$( "#date" ).datepicker({
        yearRange: "-90:+0",
      changeMonth: true,
      changeYear: true,
      dateFormat: "MM d, yy",
      altField: "#alternate",
      altFormat: "yy-mm-dd"
    });

    $("#from").datepicker({ 
    dateFormat: 'MM d, yy',
    changeMonth: true,
    showOtherMonths: true,
    selectOtherMonths: true,
    minDate: new Date(),
    maxDate: '+2y',
    altField: "#f",
    altFormat: "yy-mm-dd",
    onSelect: function(date){

        var selectedDate = new Date(date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);

       //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
        $("#to").datepicker( "option", "minDate", endDate );
        $("#to").datepicker( "option", "maxDate", '+2y' );

    }
	});

	$("#to").datepicker({ 
    dateFormat: 'MM d, yy',
    changeMonth: true,
    showOtherMonths: true,
    selectOtherMonths: true,
    altField: "#t",
    altFormat: "yy-mm-dd"
	});

	
  } );