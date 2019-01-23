
$("#stateEmpresa").change(event =>{
    $.get(`towns/${event.target.value}`, function (res, state) {
        $("#townEmpresa").empty();
        $( "#townEmpresa" ).prop( "disabled", false );
        res.forEach(element => {
            $("#townEmpresa").append(`<option value=${element.id}> ${element.nombre} </option>`);
            //$("#town").append("<option value='>" + element.id+"'>"+ element.nombre + "</option>")
        })
    });
});

$("#stateEgresados").change(event =>{
    $.get(`towns/${event.target.value}`, function (res, state) {
        $("#townEgresados").empty();
        $( "#townEgresados" ).prop( "disabled", false );
        res.forEach(element => {
            $("#townEgresados").append(`<option value=${element.id}> ${element.nombre} </option>`);
            //$("#town").append("<option value='>" + element.id+"'>"+ element.nombre + "</option>")
        })
    });
});

$("#stateTraajos").change(event =>{
    $.get(`towns/${event.target.value}`, function (res, state) {
        $("#townTrabajos").empty();
        $( "#townTrabajos" ).prop( "disabled", false );
        res.forEach(element => {
            $("#townTrabajos").append(`<option value=${element.id}> ${element.nombre} </option>`);
            //$("#town").append("<option value='>" + element.id+"'>"+ element.nombre + "</option>")
        })
    });
});
