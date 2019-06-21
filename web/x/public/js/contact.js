$(function(){


    $("#btn_add_cliente").click(function(){
        clearErrors();
        $("#form_cliente")[0].reset();
        $("#modal_cliente").modal();
    })



    $("#form_cliente").submit(function(){

        $.ajax({
            type: "POST",
            url: BASE_URL + "contact/ajax_save_cliente",
            dataType: "json",
            data: $(this).serialize(),
            beforeSend: function(){
                clearErrors();
                $("#btn_save_cliente").siblings(".help-block").html(loadingImg("Verificando.."));
            },
            success: function(response){
                clearErrors();
                if(response["status"]){
                    $("#modal_cliente").modal("hide");
                    swal("Sucesso!", "mensagem enviada com sucesso!", "success");
                    dt_cliente.ajax.reload();
    
                } else{
                    showErrorsModal(response["error_list"])
                }
            }
        })   
    return false;
    })
    


    var dt_clientes = $("#dt_cliente").DataTable({
        "autoWidth": false,
        "processing": true,
        "serverSide":true,
        "ajax": {
            "url": BASE_URL + "contact/ajax_list_cliente",
            "type":"POST",
        },
        "columnDefs":[
            {targts: "no-sort", orderable: false},
            {targts: "dt-center", className:  "dt-center"}
        ],
    })
})
