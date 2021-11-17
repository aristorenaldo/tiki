
$(document).ready(function () {
    $('#dtDynamicVerticalScrollExample').DataTable({
    "scrollY": "50vh",
    "sScrollX": "100%",
    "sScrollXInner": "100%",
    });
    $('.dataTables_length').addClass('bs-select');

    $('#dtDynamicVerticalScrollExample').on('click','.showEdit',function () {
        
        let td = $(this).closest('tr').find('td');
        let input = $('#formEdit').find('input');
        console.log(input);
        console.log(input.length-td.length);
        for (let index = 0; index < td.length-1; index++) {
            input.eq(index).val(td[index].innerHTML);
            
        }
        
        if ((input.length-td.length)==2) {
            input.eq(4).val(td[1].innerHTML);
            input.eq(5).val(td[0].innerHTML);
        }
        
    });
});

// $(function () {
    
//     $(document).on('click','.showModalEdit',function () {
        
//         const id = $(this).data('id');
//         console.log(id);
//         $('#new_id').val(id);
//         $.ajax({
//             url: "http://localhost/JNT/getEditStudent.php",
//             data: {id: id},
//             method: 'post',
//             dataType: 'json',
//             success: function (data) {
//                 // console.log(data);
                
//                 $('#new_name').val(data.name);
//                 $('#new_dept_name').val(data.dept_name).change();
//                 $('#new_tot_cred').val(data.tot_cred);
//             }
//         })
//     });

    

// });


