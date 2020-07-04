function validarCampos1(){
    validate = true;
    $(".obligatorio1").each(function () {
        if ($("#" + $(this).attr("id") + "").val() == ""){
            validate = false;
            $("#" + $(this).attr("id") + "").css("border-color", "#FFBE33");
        } else {
            $("#" + $(this).attr("id") + "").css("border-color", "");
        }   
    });	
    if (!validate){
        alert("Faltan campos por diligenciar");
    } else{
        document.getElementById("form1").submit();
    }
}

function validarCampos2(){
    validate = true;
    $(".obligatorio2").each(function () {
        if ($("#" + $(this).attr("id") + "").val() == ""){
            validate = false;
            $("#" + $(this).attr("id") + "").css("border-color", "#FFBE33");
        } else {
            $("#" + $(this).attr("id") + "").css("border-color", "");
        }   
    });	
    if (!validate){
        alert("Faltan campos por diligenciar");
    } else{
        document.getElementById("form2").submit();
    }
}

function registrar(){
    $("#cardActualizar").attr("hidden", true);
    $("#cardInsertar").attr("hidden", false);
    $(".obligatorio1").each(function () {
            $("[name='" + $(this).attr("name") + "']").css("border-color", "");
            $("[name='" + $(this).attr("name") + "']").val("");
    });
    $(".obligatorio2").each(function () {
        $("[name='" + $(this).attr("name") + "']").css("border-color", "");
        $("[name='" + $(this).attr("name") + "']").val("");
    });	
}