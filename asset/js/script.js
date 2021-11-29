
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
        // console.log(td.length);
        // console.log(td);
        console.log(input.length-td.length);
        for (let index = 0; index < td.length-1; index++) {
            input.eq(index).val(td[index].innerHTML);
            
        }
        
        if ((input.length-td.length)>0) {
            // start index
            //i index input
            let i =  td.length - 1;
            
            // j index td
            let j = 0;
            while (i < input.length-1) {
                input.eq(i).val(td[j].innerHTML)
                i++;
                j++;
            }
            // input.eq(4).val(td[0].innerHTML);
            // input.eq(5).val(td[1].innerHTML);
        }
        
    });

    $('#modalAdd').on('show.bs.modal', function (event) {
        let button  = $(event.relatedTarget); // Button that triggered the modal 
        let modal  = $(this);
        let title = 'Tambah '+button.data('title');
        let action = 'add'+button.data('title')+'.php';
        // alert(title);
        modal.find('.modal-title').text(title);
        modal.find('form').attr('action', action);
        console.log(modal.find('form'));
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


