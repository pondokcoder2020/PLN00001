function tambah_data(url){
    $.ajax({
        type: 'POST',
        url: url,
        data: {

        },
        beforeSend: function() {
            $(".preloader").show();
        },
        complete: function() {
            $(".preloader").hide();
        },
        success: function(msg) {
            $("#form-modal").html(msg);
            $("#form-modal").modal('show');
        },
        error: function(x){
            console.log(x);
        }
    });
}

function edit_data(id,url){

    // alert(id+','+url);

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            'id': id
        },
        beforeSend: function() {
            $(".preloader").show();
        },
        complete: function() {
            $(".preloader").hide();
        },

        success: function(msg) {
            $("#form-modal2").html(msg);
            $("#form-modal2").modal('show');
        }
    });
}

function hapus_data(id,url){
    // alert(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.value) {
            document.location.href = url +'-'+ id;
        }
    });

    return false;
}

function approved_btn(id,url){
    // alert(id);
    Swal.fire({
        title: 'Yakin?',
        text: "Anda akan mengkonfirmasi approval ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve!'
    }).then((result) => {
        if(result.value) {
            document.location.href = url +'-'+ id;
        }
    });

    return false;
}