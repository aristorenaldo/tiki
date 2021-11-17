
$(document).ready(function () {
    $('#dtDynamicVerticalScrollExample').DataTable({
    "scrollY": "50vh",
    "sScrollX": "100%",
    "sScrollXInner": "100%",
    });
    $('.dataTables_length').addClass('bs-select');

    $('#dtDynamicVerticalScrollExample').on('click','.showEditPenerima',function () {
        
        let td = $(this).closest('tr').find('td');
        let input = $('#modalEdit').find('input');
        console.log(input[0]);
        for (let index = 0; index < td.length-1; index++) {
            input.eq(index).val(td[index].innerHTML);
            
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


