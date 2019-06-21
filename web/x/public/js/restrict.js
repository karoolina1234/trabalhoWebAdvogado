$(function(){


   

    $("#btn_add_area").click(function(){
        clearErrors();
		$("#form_area")[0].reset();
		$("#area_img_path").attr("src", "");
		$("#modal_area").modal();
    })

    $("#btn_add_member").click(function(){
        clearErrors();
		$("#form_member")[0].reset();
		$("#member_photo_path").attr("src", "");
        $("#modal_member").modal();
    })

    $("#btn_add_user").click(function(){
        clearErrors();
		$("#form_user")[0].reset();
        $("#modal_user").modal();
    })


    
    
    
    $("#btn_upload_area_img").change(function(){
        uploadImg($(this), $("#area_img_path"), $("#area_img"));
 
    });

    
   
	$("#btn_upload_member_photo").change(function() {
		uploadImg($(this), $("#member_photo_path"), $("#member_photo"));
	});

    $("#form_area").submit(function(){

            $.ajax({
                type: "POST",
                url: BASE_URL + "restrict/ajax_save_areas",
                dataType: "json",
                data: $(this).serialize(),
                beforeSend: function(){
                    clearErrors();
                    $("#btn_save_area").siblings(".help-block").html(loadingImg("Verificando.."));
                },
                success: function(response){
                    clearErrors();
                    if(response["status"]){
                        $("#modal_area").modal("hide");
                    swal("Sucesso!", "area salva com sucesso!", "success");
                    dt_area.ajax.reload();

                    } else{
                        showErrorsModal(response["error_list"])
                    }
                }
            })   
        return false;
    })

    
    $("#form_member").submit(function(){

        $.ajax({
            type: "POST",
            url: BASE_URL + "restrict/ajax_save_member",
            dataType: "json",
            data: $(this).serialize(),
            beforeSend: function(){
                clearErrors();
                $("#btn_save_member").siblings(".help-block").html(loadingImg("Verificando.."));
            },
            success: function(response){
                clearErrors();
                if(response["status"]){
                    $("#modal_member").modal("hide");
                    swal("Sucesso!", "membro salvo com sucesso!", "success");
                    dt_member.ajax.reload();

                } else{
                    showErrorsModal(response["error_list"])
                }
            }
        })   
    return false;
})



$("#form_user").submit(function(){

    $.ajax({
        type: "POST",
        url: BASE_URL + "restrict/ajax_save_user",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function(){
            clearErrors();
            $("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando.."));
        },
        success: function(response){
            clearErrors();
            if(response["status"]){
                $("#modal_user").modal("hide");
                swal("Sucesso!", "Usuario salvo com sucesso!", "success");
                dt_user.ajax.reload();

            } else{
                showErrorsModal(response["error_list"])
            }
        }
    })   
return false;
})




$("#btn_your_user").click(function() {

    $.ajax({
        type: "POST",
        url: BASE_URL + "restrict/ajax_get_user_data",
        dataType: "json",
        data: {"user_id": $(this).attr("user_id")},
        success: function(response) {
            clearErrors();
            $("#form_user")[0].reset();
            $.each(response["input"], function(id, value) {
                $("#"+id).val(value);
            });
            $("#modal_user").modal();
        }
    })

    return false;
})

function active_btn_area(){
	$(".btn-edit-area").click(function(){
        $.ajax({
            type: "POST",
            url: BASE_URL + "restrict/ajax_get_area_data",
            dataType: "json",
            data: {"area_id": $(this).attr("area_id")},
            success: function(response) {
                clearErrors();
                $("#form_area")[0].reset();
                $.each(response["input"], function(id, value) {
                    $("#"+id).val(value);
                });
                $("#area_img_path").attr("src", response["img"]["area_img_path"]);
                $("#modal_area").modal();
            }
    })


})



$(".btn-del-area").click(function(){
			
    area_id = $(this);
    swal({
        title: "Atenção!",
        text: "Deseja deletar essa area?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d9534f",
        confirmButtonText: "Sim",
        cancelButtontext: "Não",
        closeOnConfirm: true,
        closeOnCancel: true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "restrict/ajax_delete_area_data",
                dataType: "json",
                data: {"area_id": area_id.attr("area_id")},
                success: function(response) {
                    swal("Sucesso!", "Ação executada com sucesso", "success");
                    dt_area.ajax.reload();
                }
            })
        }
    })

});



}




function active_btn_member(){
	$(".btn-edit-member").click(function(){
        $.ajax({
            type: "POST",
            url: BASE_URL + "restrict/ajax_get_member_data",
            dataType: "json",
            data: {"member_id": $(this).attr("member_id")},
            success: function(response) {
                clearErrors();
                $("#form_member")[0].reset();
                $.each(response["input"], function(id, value) {
                    $("#"+id).val(value);
                });
                $("#member_photo_path").attr("src", response["img"]["member_photo_path"]);
                $("#modal_member").modal();
            }
    })


})

$(".btn-del-member").click(function(){
			
    member_id = $(this);
    swal({
        title: "Atenção!",
        text: "Deseja deletar esse membro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d9534f",
        confirmButtonText: "Sim",
        cancelButtontext: "Não",
        closeOnConfirm: true,
        closeOnCancel: true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "restrict/ajax_delete_member_data",
                dataType: "json",
                data: {"member_id": member_id.attr("member_id")},
                success: function(response) {
                    swal("Sucesso!", "Ação executada com sucesso", "success");
                    dt_member.ajax.reload();
                }
            })
        }
    })

});



}


 //não sei se é uma boa idea, TALVEZ EU APAGUE DPS 


function active_btn_user(){
	$(".btn-edit-user").click(function(){
        $.ajax({
            type: "POST",
            url: BASE_URL + "restrict/ajax_get_user_data",
            dataType: "json",
            data: {"user_id": $(this).attr("user_id")},
            success: function(response) {
                clearErrors();
                $("#form_user")[0].reset();
                $.each(response["input"], function(id, value) {
                    $("#"+id).val(value);
                });
        
                $("#modal_user").modal();
            }
    })


})

$(".btn-del-user").click(function(){
			
    user_id = $(this);
    swal({
        title: "Atenção!",
        text: "Deseja deletar esse membro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d9534f",
        confirmButtonText: "Sim",
        cancelButtontext: "Não",
        closeOnConfirm: true,
        closeOnCancel: true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "restrict/ajax_delete_user_data",
                dataType: "json",
                data: {"user_id": user_id.attr("user_id")},
                success: function(response) {
                    swal("Sucesso!", "Ação executada com sucesso", "success");
                    dt_user.ajax.reload();
                }
            })
        }
    })

});

}




var dt_area = $("#dt_area").DataTable({
    "autoWidth": false,
    "processing": true,
    "serverSide":true,
    "ajax": {
        "url": BASE_URL + "restrict/ajax_list_area",
        "type":"POST",
    },
    "columnDefs":[
        {targts: "no-sort", orderable: false},
        {targts: "dt-center", className:  "dt-center"}


    ],
    "drawCallback": function() {
        active_btn_area();
    }
})
    



var dt_member = $("#dt_team").DataTable({

    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": BASE_URL + "restrict/ajax_list_member",
        "type": "POST",
    },
    "columnDefs": [
        { targets: "no-sort", orderable: false },
        { targets: "dt-center", className: "dt-center" },
    ],
    "drawCallback": function() {
        active_btn_member();
    }
})



var dt_user= $("#dt_users").DataTable({

    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": BASE_URL + "restrict/ajax_list_user",
        "type": "POST",
    },
    "columnDefs": [
        { targets: "no-sort", orderable: false },
        { targets: "dt-center", className: "dt-center" },
    ],
    "drawCallback": function() {
        active_btn_user();
    }
})
})